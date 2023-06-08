const faqs = Array.prototype.slice.call(document.querySelectorAll(".faq-item"));

faqs.forEach((faq) => {
    const question = faq.querySelector(".faq-question");
    
    question.addEventListener("click", () => {
       
        question.parentElement.classList.toggle("active");
    });
});
