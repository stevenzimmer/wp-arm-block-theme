const contentAnchors = Array.prototype.slice.call(document.querySelectorAll(".entry-content a[href]"));

// const btnLinks = Array.prototype.slice.call(document.querySelectorAll(".btn, .wp-element-button"));

const contentAnchorsWithText = contentAnchors.filter((anchor) => {
  return anchor.text;
});


contentAnchorsWithText.forEach((anchor,i) => {

  anchor.addEventListener("click", (e) => {
      // e.preventDefault();

      const anchorClassList = anchor.classList;
      const isOutbound = window.location.hostname.toLowerCase() !== anchor.host

      // console.log({anchor});
      window.dataLayer.push({ 
        event: "content_click", 
        linkText: anchor.text + " [" + (i + 1) + "]",
        linkUrl: !isOutbound && anchor.hash ? anchor.hash : anchor.origin + anchor.pathname,
        isBtn: anchorClassList.contains("btn") || anchorClassList.contains("wp-element-button") ? true : false,
        isOutbound
      });

  });
});