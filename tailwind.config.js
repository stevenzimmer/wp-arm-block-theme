const colors = require("tailwindcss/colors");

module.exports = {
    content: [
        "./src/**/*.js",
        "./blocks/**/*.{js,php}",
        "./templates/*.html",
        "./template-parts/**/*.php",
        "./patterns/*.php",
        "./inc/*.{js,txt}",
        "./partials/{footer,navigation}/**/*.php",
        "./page.php",
        "./page-event-alternative.php",
        "./page-landing-page.php",
        "./index.php",
        "./functions.php",
        "./footer.php",
        "./header.php",
        "./single.php",
        "./archive-cpt_resources.php",
        "./archive-cpt_events.php",

        "./single-cpt_events.php",
        "./front-page.php",
        "./../../mu-plugins/*.php",
    ],
    theme: {
        extend: {
            colors: {
                // Remove the "gray" colors from the theme.
                gray: {},

                a: {
                    green: "#006B68",
                    grey: "#A5B6C1",
                    blue: "#4AC1E0",
                    yellow: "#F4B700",
                    primary: "#263D5C"
                },

                green: {
                    lighter: "#95FFBA",
                    light: "#E4F3E9",
                    neutral: "#00CA58",
                    dark: "#37C666",
                    darker: "#226B3A",
                },

                blue: {
                    ...colors["blue"],
                    lighter: "#38B5D9",
                    light: "#005491",
                    dark: "#001321",
                    darker: "#21344C",
                    primary: "#263D5C",
                    secondary: "#DFECF6",
                    tertiary: "#00669e",
                },

                purple: {
                    dark: "#334155",
                },

                grey: {
                    ...colors["slate"],
                    light: "#838d95",
                },

                red: {
                    light: "#FFEDE0",
                    neutral: "#FF6A00",
                    dark: "#C35608",
                },

                yellow: {
                    lighter: "#fff3d3",
                    light: "#F4B700",
                    dark: "#a47600",
                },
            },
            fontFamily: {
                as: ["'AmpleSoftPro-Regular'", "Arial", "sans-serif"],
                asBold: ["'AmpleSoftPro-Bold'", "Arial", "sans-serif"],
                asMedium: ["'AmpleSoftPro-Medium'", "Arial", "sans-serif"],
                os: ["'Open Sans'", "Arial", "sans-serif"],
            },
        },
        container: {
            center: true,
            padding: "1rem",
            // default breakpoints but with 40px removed
            screens: {
                "2xl": "1200px",
            },
        },
    },
    plugins: [require("@tailwindcss/typography")],
};
