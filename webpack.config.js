const defaultConfig = require("@wordpress/scripts/config/webpack.config");
// const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const path = require("path");
const OptimizeCssAssetsWebpackPlugin = require("optimize-css-assets-webpack-plugin");
const TerserWebpackPlugin = require("terser-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
// const CopyPlugin = require("copy-webpack-plugin");
// const partytown = require("@builder.io/partytown/utils");
module.exports = {
    ...defaultConfig,
    entry: {
        index: "./src/index.js",
        heading: "./blocks/heading/scripts.js",
        button: "./blocks/button/scripts.js",
        sectionlink: "./blocks/sectionlink/scripts.js",
        container: "./blocks/container/scripts.js",
        uberflipstream: "./blocks/uberflipstream/scripts.js",
        mktoform: "./blocks/mktoform/scripts.js",
        customcolumns: "./blocks/customcolumns/scripts.js",
        singlecolumn: "./blocks/singlecolumn/scripts.js",
        carousel: "./blocks/carousel/scripts.js",
        quoteslide: "./blocks/quoteslide/scripts.js",
        customquote: "./blocks/customquote/scripts.js",
        custombox: "./blocks/custombox/scripts.js",
        ytplaylist: "./blocks/ytplaylist/scripts.js",
        tabs: "./blocks/tabs/scripts.js",
        tabsitem: "./blocks/tabsitem/scripts.js",
        tabspanel: "./blocks/tabspanel/scripts.js",
        texturedbg: "./blocks/texturedbg/scripts.js",
        productpricing: "./blocks/productpricing/scripts.js",
        logoscarousel: "./blocks/logoscarousel/scripts.js",
        loadmore: "./blocks/loadmore/scripts.js",
        ytcustomembed: "./blocks/ytcustomembed/scripts.js",
        signupform: "./blocks/signupform/scripts.js",
        faq: "./blocks/faq/scripts.js",
        comparisons: "./blocks/comparisons/scripts.js",
        productstack: "./blocks/productstack/scripts.js",
        productrow: "./blocks/productrow/scripts.js",

    },
    output: {
        filename: "./[name]/scripts.js",
        path: path.resolve(__dirname, "build"),
    },
    module: {
        ...defaultConfig.module,
        rules: [
            ...defaultConfig.module.rules,
            {
                test: /\.(less)$/,
                use: [
                    "style-loader",
                    "css-loader",
                    "postcss-loader",
                    "less-loader",
                ],
            },
        ],
    },
    optimization: {
        minimizer: [
            new OptimizeCssAssetsWebpackPlugin(),
            new TerserWebpackPlugin(),
        ],
    },
    plugins: [
        ...defaultConfig.plugins,
        new MiniCssExtractPlugin({
            filename: ({ chunk }) => {
                return `${chunk.runtime}/styles.min.css`;
            },
        }),
        // new BrowserSyncPlugin({
        //     host: "localhost",
        //     port: 3000,
        //     // proxy the Webpack Dev Server endpoint
        //     // (which should be serving on http://localhost:3100/)
        //     // through BrowserSync
        //     proxy: "/",
        //     files: ["./**/*.php"],
        //     watch: true,
        // }),
    ],
};
