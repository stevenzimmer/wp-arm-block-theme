// console.log("packaging");
const packageCards = Array.prototype.slice.call(
  document.querySelectorAll(".package-card")
);

const packageProducts = Array.prototype.slice.call(
  document.querySelectorAll(".package-product")
);

const packageProductInners = Array.prototype.slice.call(
  document.querySelectorAll(".package-product-inner")
);

const packageTables = Array.prototype.slice.call(
  document.querySelectorAll(".package-table")
);

const toggleFeaturesBtn = Array.prototype.slice.call(
  document.querySelectorAll(".toggle-features.packaging")
);

packageCards.forEach((card, i, all) => {

  const packageToggleBtn = card.querySelector(".package-toggle-btn");

  packageToggleBtn.addEventListener("click", () => {

    toggleFeaturesBtn.forEach((btn) => {
      btn.querySelector(".toggle-features-caret").classList.add("rotate-180");
    });
    packageProductInners.forEach(table => {
      table.classList.remove("active");
    });
    // 

    packageTables.forEach(table => {
      table.classList.remove("active");
    });

    if(card.classList.contains("active")) {
      
      card.classList.remove("active");
    
      document.getElementById("package-" + card.id).classList.remove("active");

    } else {

      all.forEach((item) => {
        item.classList.remove("active");
      });
      
      packageProducts.forEach((product) => {
        product.classList.remove("active");
      });

      card.classList.add("active");
    
      document.getElementById("package-" + card.id).classList.add("active");
    }
    
  });
});

toggleFeaturesBtn.forEach((toggleBtn, i, all) => {
  // console.log("toggle feature button");
  
  const caret = toggleBtn.querySelector(".toggle-features-caret");

  

  const packageTable = document.getElementById("package-table-" + toggleBtn.id);

  toggleBtn.addEventListener("click", () => {
    // console.log("toggle button click");

    caret.classList.toggle("rotate-180");
    
    
    if( document.getElementById("package-product-inner-" + toggleBtn.id) ) {

    
    const wrapper = document.getElementById("package-product-inner-" + toggleBtn.id);
    if(!wrapper.classList.contains("active")) {

      if(packageTable.classList.contains("active")) {

        caret.classList.add("rotate-180");
  
        wrapper.classList.remove("active");
  
      } else {

        // Reset States
        packageTables.forEach(table => {
          table.classList.remove("active");
        });
        packageProductInners.forEach(table => {
          table.classList.remove("active");
        });

        all.forEach((btn) => {

          btn.querySelector(".toggle-features-caret").classList.add("rotate-180");
        });
    
        caret.classList.remove("rotate-180");
      
        packageTable.classList.add("active");
  
        wrapper.classList.add("active");
      }

    } else {
      console.log('is active');

      // Reset States
      packageTables.forEach(table => {
        table.classList.remove("active");
      });
      packageProductInners.forEach(table => {
        table.classList.remove("active");
      });

      all.forEach((btn) => {

        btn.querySelector(".toggle-features-caret").classList.add("rotate-180");
      });

    }
  } else {
    packageTable.classList.toggle("active");
  }
  
    
  });
  
});