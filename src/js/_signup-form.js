const Qs = require("qs");

const signupForms = Array.prototype.slice.call(
    document.querySelectorAll(".signup-form")
);

let formObj = {};

signupForms.forEach((form) => {
    // console.log({ form });
   
    const signupFormError = form.querySelector(".signup-form-error");

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        // Clear errors
        resetError(signupFormError);

        disableForm(form);

        btnProcess(form);

        Array.from(e.target.elements).forEach((element) => {
            element.classList.remove("border-red-500", "bg-red-100");
            if (element.name) {
                // console.dir({element});
                formObj[element.name] = element.value;

                if (formObj[element.name] === "") {
                    return false;
                }
            }
        });


        let params = {
            action: "send_to_signup_api",
            payload: formObj,
        };

        try {
            fetch(`${window.location.origin}/wp-admin/admin-ajax.php`, {
                method: "post",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: Qs.stringify(params),
            })
                .then((res) => res.json())
                .then((data) => {
               

                    if (data.success) {
               
                        if (data.data.body) {
                            const dataBody = JSON.parse(data.data.body);
                            // console.log("there is a body on the data data");
                            // console.log({ dataBody });
                            if (dataBody.error_id) {
                                // console.log("there was an error");

                                form.elements["userEmail"].classList.add(
                                    "border-red-500",
                                    "bg-red-100"
                                );
                                generateError(
                                    signupFormError,
                                    dataBody.errors[0].message
                                );

                                btnReset(form);

                                enableForm(form);
                            } else {
                                // console.log(dataBody.orgId);
                                // console.log({params});

                                params.payload["orgId"] = dataBody.orgId;

                                // Success!
                                // Stackoverflow: 414348_Armory.io | Pilot Campaign | Feb - May '23 - Try for Free TY Page Pixel
                                (function() {
                                    var a = String(Math.floor(Math.random() * 10000000000000000));
                                    new Image().src = 'https://pubads.g.doubleclick.net/activity;xsp=5096285;ord='+ a +'?';
                                  })();

                                // Generate GA event
                                // console.log("data layer push");
                                window.dataLayer.push({
                                    event: "Sign Up Form Submit",
                                });


                                // document.getElementById(
                                //     "complete-orgId"
                                // ).innerText = dataBody.orgId;
                                // document.getElementById(
                                //     "complete-userEmail"
                                // ).innerText = params.payload["userEmail"];

                                // Remove form from page and show a success message
                                removeForm(e.target);

                                // Now send payload with orgID to Big query DB
                                sendToBigQuery(params.payload);
                            }
                        } else {
                            // console.log("no data body");

                            if (
                                data.data.response.message ===
                                "Too Many Requests"
                            ) {
                                generateError(
                                    signupFormError,
                                    data.data.response.message +
                                        ", Please wait..."
                                );
                                setTimeout(() => {
                                    btnReset(form);

                                    enableForm(form);
                                    resetError(signupFormError);
                                }, 7000);
                            } else {
                                generateError(
                                    signupFormError,
                                    data.data.response.message
                                );
                            }
                        }
                    } else {
                        // console.log("not successful");
                        generateError(
                            signupFormError,
                            "Please ensure " +
                                data.data +
                                " is properly formatted"
                        );
                        // console.dir(form.elements[data.data]);
                        // form.elements[data.data].value = "";
                        form.elements[data.data].classList.add(
                            "border-red-500",
                            "bg-red-100"
                        );

                        form.elements[data.data].focus();

                        // console.log(data.data);
                        btnReset(form);

                        enableForm(form);
                    }
                });
        } catch (error) {
            generateError(signupFormError, error.message);
            btnReset(form);

            enableForm(form);
        }
    });
});

function sendToBigQuery(payload) {
    let params = {
        action: "send_to_bigquery",
        payload: {
            companyName: payload.companyName,
            orgId: payload.orgId,
            userEmail: payload.userEmail,
            userName: payload.userName
        },
    };

    // console.log("sending to bigquery");
    // console.log("sending payload to big query");
    // console.log({ payload });
    // payload.action = "send_to_bigquery";

    // console.log("send to bigquery", params );

    try {
        fetch(`${window.location.origin}/wp-admin/admin-ajax.php`, {
            method: "post",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: Qs.stringify(params),
        })
            .then((res) => res.json())
            .then((data) => {
                console.log("response", data );
            });
    } catch (error) {
        console.log({ error });
    }
 
}

function enableForm(form) {
    Array.from(form.elements).forEach((element) => {
        element.removeAttribute("disabled");
    });
}

function disableForm(form) {
    Array.from(form.elements).forEach((element) => {
        element.setAttribute("disabled", "");
    });
}

function btnProcess(form) {
    form.querySelector(".btn-wrapper .btn").classList.add("disabled");
    form.querySelector(".btn").value = "Processing...";
    form.querySelector(".btn-wrapper .btn-status").classList.remove("hidden");
}

function btnReset(form) {
    form.querySelector(".btn-wrapper .btn").classList.remove("disabled");
    form.querySelector(".btn").value = "Sign Up";
    form.querySelector(".btn-wrapper .btn-status").classList.add("hidden");
}

function removeForm(form) {
    form.parentElement.classList.add("hidden");

    form.parentElement.parentElement
        .querySelector(".signup-form-success")
        .classList.remove("hidden");
}

function resetError(errorElem) {
    errorElem.classList.add("hidden");
    errorElem.innerText = "";
}

function generateError(errorElem, message) {
    errorElem.classList.remove("hidden");
    errorElem.innerText = message;
}
