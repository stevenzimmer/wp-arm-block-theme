// const pricingBtns = Array.prototype.slice.call(
//     document.querySelectorAll(".pricing-btn")
// );

// const pricingCards = Array.prototype.slice.call(
//     document.querySelectorAll(".pricing-card")
// );

// const pricingTables = Array.prototype.slice.call(
//     document.querySelectorAll(".pricing-table")
// );

// const toggleFeatures = Array.prototype.slice.call(
//     document.querySelectorAll(".toggle-features")
// );

// toggleFeatures.forEach((toggle) => {
//     toggle.addEventListener("click", function() {
//         toggle.classList.toggle("rotate-180");
//         pricingTables[i].classList.toggle("active");
//     });
// });

// pricingTables.forEach((table) => {
  

//     if (window.location.hash) {
//         if (table.id === window.location.hash.slice(1)) {
//             openPriceTable(window.location.hash.slice(1));
//             return;
//         }
//     }

//     if(table.querySelector(".toggle-features")) {

//         const toggleFeatures = table.querySelector(".toggle-features");

//         const toggleFeaturesCaret = toggleFeatures.querySelector(".toggle-features-caret");

//         toggleFeatures.addEventListener("click", function(e) {
//             toggleFeaturesCaret.classList.toggle("rotate-180");
//             table.querySelector(".table-wrapper").classList.toggle("hidden");

//         });
//     }
// });

// pricingCards.forEach((card, i, all) => {
//     card.addEventListener("click", (e) => {
//         const hash = card.dataset.card;
//         openPriceTable(hash);
//     });
// });

// function openPriceTable(hash) {
//     pricingTables.forEach((table) => {
//         table.classList.add("hidden");
//     });

//     pricingCards.forEach((card) => {
//         card.classList.remove("active");
//     });

//     document.getElementById(`card-${hash}`).classList.add("active");
//     document.getElementById(hash).classList.remove("hidden");
// }
