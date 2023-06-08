import Flickity from "flickity";
if (document.querySelector(".block-carousel")) {
    var flky = new Flickity(".block-carousel", {
        // options, defaults listed

        accessibility: true,
        // enable keyboard navigation, pressing left & right keys

        adaptiveHeight: false,
        // set carousel height to the selected slide

        autoPlay: false,
        // advances to the next cell
        // if true, default is 3 seconds
        // or set time between advances in milliseconds
        // i.e. `autoPlay: 1000` will advance every 1 second

        cellAlign: "center",
        // alignment of cells, 'center', 'left', or 'right'
        // or a decimal 0-1, 0 is beginning (left) of container, 1 is end (right)

        cellSelector: undefined,
        // specify selector for cell elements

        contain: false,
        // will contain cells to container
        // so no excess scroll at beginning or end
        // has no effect if wrapAround is enabled

        draggable: ">1",
        // enables dragging & flicking
        // if at least 2 cells

        dragThreshold: 3,
        // number of pixels a user must scroll horizontally to start dragging
        // increase to allow more room for vertical scroll for touch devices

        freeScroll: false,
        // enables content to be freely scrolled and flicked
        // without aligning cells

        friction: 0.2,
        // smaller number = easier to flick farther

        groupCells: false,
        // group cells together in slides

        initialIndex: 0,
        // zero-based index of the initial selected cell

        lazyLoad: true,
        // enable lazy-loading images
        // set img data-flickity-lazyload="src.jpg"
        // set to number to load images adjacent cells

        percentPosition: true,
        // sets positioning in percent values, rather than pixels
        // Enable if items have percent widths
        // Disable if items have pixel widths, like images

        prevNextButtons: true,
        // creates and enables buttons to click to previous & next cells

        pageDots: true,
        // create and enable page dots

        resize: true,
        // listens to window resize events to adjust size & positions

        rightToLeft: false,
        // enables right-to-left layout

        setGallerySize: false,
        // sets the height of gallery
        // disable if gallery already has height set with CSS

        watchCSS: false,
        // watches the content of :after of the element
        // activates if #element:after { content: 'flickity' }

        wrapAround: true,
        // at end of cells, wraps-around to first for infinite scrolling
    });
}
//
//   Variables
//
//////////////////////////////////////////////////////////////////////

if (document.querySelector(".carousel-ticker")) {
    const carouselTickers = Array.prototype.slice.call(document.querySelectorAll(".carousel-ticker"));

    carouselTickers.forEach((ticker,i) => {
        // Play with this value to change the speed
        let tickerSpeed = 1;

        let flickity = null;
        let isPaused = false;

        const update = () => {
            if (isPaused) return;
            if (flickity.slides) {
                flickity.x = (flickity.x - tickerSpeed) % flickity.slideableWidth;
                flickity.selectedIndex = flickity.dragEndRestingSelect();
                flickity.updateSelectedSlide();
                flickity.settle(flickity.x);
            }
            window.requestAnimationFrame(update);
            // console.log("slides", flickity.slides);
            // console.log("x", flickity.x);
            // console.log("index", flickity.selectedIndex);

        };

        const pause = () => {
            isPaused = true;
        };

        const play = () => {
            if (isPaused) {
                isPaused = false;
                window.requestAnimationFrame(update);
            }
        };

        flickity = new Flickity(ticker, {
            autoPlay: false,
            prevNextButtons: false,
            pageDots: false,
            draggable: false,
            wrapAround: true,
            selectedAttraction: 0.015,
            friction: 0.25,
            cellAlign: 0,
        });
        flickity.x = 0;

        ticker.addEventListener("mouseenter", pause, false);
        ticker.addEventListener("focusin", pause, false);
        ticker.addEventListener("mouseleave", play, false);
        ticker.addEventListener("focusout", play, false);

        // flickity.on("dragStart", () => {
        //     isPaused = true;
        // });

        // Start Ticker
        update();
    });
}
