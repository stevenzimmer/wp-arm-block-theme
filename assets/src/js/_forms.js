/* const */
const MKTOFORM_ID_ATTRNAME = "data-formid";
const newsletter_btns = Array.prototype.slice.call(
    document.querySelectorAll(".newsletter-btn")
);
let mkto_forms = Array.prototype.slice.call(
    document.querySelectorAll("[" + MKTOFORM_ID_ATTRNAME + "]")
);

if (mkto_forms.length > 0) {
    let mkto_forms_ids = [];

    for (let i = 0; i < mkto_forms.length; ++i) {
        if (
            !mkto_forms_ids.includes(
                mkto_forms[i].getAttribute(MKTOFORM_ID_ATTRNAME)
            )
        ) {
            mkto_forms_ids.push(
                mkto_forms[i].getAttribute(MKTOFORM_ID_ATTRNAME)
            );
        }
    }

    const mktoFormConfig = {
        podId: "//at.armory.io",
        munchkinId: "644-NAF-166",
        formIds: mkto_forms_ids,
    };

    /* ---- Prevent label confusion from multiple forms ---- */
    function mktoFormChain(config) {
        /* util */
        var arrayFrom = Function.prototype.call.bind(Array.prototype.slice);
        let formSubmit = false;
        /* fix inter-form label bug! */
        MktoForms2.whenRendered(function(form) {
            // console.log({ form });
            form.onSubmit(function(data) {
                if (form.getFormElem()[0].classList.contains("newsletter")) {
                    if (!formSubmit) {
                        form.submittable(false);
                        form.getFormElem()[0].classList.add("hidden");
                        document
                            .getElementById("newsletter-success")
                            .classList.remove("hidden");

                        document
                            .getElementById("optin-text")
                            .classList.remove("hidden");

                        newsletter_btns.forEach((btn) => {
                            btn.addEventListener("click", function(e) {
                                if (parseInt(btn.dataset.optin)) {
                                    document
                                        .getElementById("optin-accept")
                                        .classList.remove("hidden");
                                    data.vals({
                                        Explicit_Optin__c: true,
                                    });
                                } else {
                                    data.vals({
                                        Explicit_Optin__c: false,
                                    });
                                }
                                document
                                    .getElementById("optin-text")
                                    .classList.add("hidden");
                                form.submittable(true);
                                formSubmit = true;
                                form.submit();
                            });
                        });
                    }
                }
            });

            var formEl = form.getFormElem()[0],
                rando = "_" + new Date().getTime() + Math.random();

            arrayFrom(formEl.querySelectorAll("label[for]")).forEach(function(
                labelEl
            ) {
                var forEl = formEl.querySelector(
                    '[id="' + labelEl.htmlFor + '"]'
                );
                if (forEl) {
                    labelEl.htmlFor = forEl.id = forEl.id + rando;
                }
            });
        });

        MktoForms2.whenReady(function(form) {
            // console.log(form.getId());

            form.onSuccess(function(vals, url) {
                // form.getFormElem().hide();
                if (form.getId() === 1154) {
                    return false;
                }
            });
        });

        /* chain, ensuring only one #mktoForm_nnn exists at a time */
        arrayFrom(config.formIds).forEach(function(formId) {
            var loadForm = MktoForms2.loadForm.bind(
                    MktoForms2,
                    config.podId,
                    config.munchkinId,
                    formId
                ),
                formEls = arrayFrom(
                    document.querySelectorAll(
                        "[" + MKTOFORM_ID_ATTRNAME + '="' + formId + '"]'
                    )
                );

            (function loadFormCb(formEls) {
                var formEl = formEls.shift();
                formEl.id = "mktoForm_" + formId;

                loadForm(function(form) {
                    formEl.id = "";
                    if (formEls.length) {
                        loadFormCb(formEls);
                    }
                });
            })(formEls);
        });
    }

    mktoFormChain(mktoFormConfig);
}
