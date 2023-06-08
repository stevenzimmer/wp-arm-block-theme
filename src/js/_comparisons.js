const comparionsBtns = Array.prototype.slice.call(
  document.querySelectorAll(".comparison-feature-btn")
);

comparionsBtns.forEach(btn => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();
  
    const comparisonRows = Array.prototype.slice.call(btn.parentElement.parentElement.querySelectorAll(".comparison-feature-row"));

    comparisonRows.forEach((row) => {
      row.classList.remove("hidden");
      row.classList.add("flex");
    });

    btn.parentElement.classList.add("hidden");
  });
});