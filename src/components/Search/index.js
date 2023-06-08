import React, { useState, useRef, useEffect } from "react";
import { motion, AnimatePresence } from "framer-motion";
import AppSearchAPIConnector from "@elastic/search-ui-app-search-connector";

import {
    ErrorBoundary,
    Facet,
    SearchProvider,
    SearchBox,
    Results,
    PagingInfo,
    ResultsPerPage,
    Paging,
    Sorting,
    WithSearch,
} from "@elastic/react-search-ui";

import "@elastic/react-search-ui-views/lib/styles/styles.css";

import {
    buildAutocompleteQueryConfig,
    buildFacetConfigFromConfig,
    buildSearchOptionsFromConfig,
    buildSortOptionsFromConfig,
    getConfig,
    getFacetFields,
} from "./config/config-helper";

const { hostIdentifier, searchKey, endpointBase, engineName } = getConfig();
const connector = new AppSearchAPIConnector({
    searchKey,
    engineName,
    hostIdentifier,
    endpointBase,
});
const config = {
    searchQuery: {
        facets: buildFacetConfigFromConfig(),
        ...buildSearchOptionsFromConfig(),
    },
    autocompleteQuery: buildAutocompleteQueryConfig(),
    apiConnector: connector,
    alwaysSearchOnInitialLoad: false,
    initialState: { resultsPerPage: 10 },
    // urlPushDebounceLength: 1000,
    // onResultClick: (e) => console.log("result click", e),
};

export default function Search() {
    const [isExpanded, setIsExpanded] = useState(false);

    useEffect(() => {
        if (isExpanded) {
            document.body.classList.add("overflow-hidden");
        } else {
            document.body.classList.remove("overflow-hidden");
        }
    }, [isExpanded]);

    return (
        <SearchProvider config={config}>
            <WithSearch
                mapContextToProps={({
                    searchTerm,
                    setSearchTerm,
                    wasSearched,
                    results,
                    isLoading,
                    resultsPerPage,
                }) => ({
                    searchTerm,
                    setSearchTerm,
                    wasSearched,
                    results,
                    isLoading,
                    resultsPerPage,
                })}
            >
                {({
                    searchTerm,
                    setSearchTerm,
                    wasSearched,
                    results,
                    isLoading,
                    resultsPerPage,
                }) => {
                    return (
                        <ErrorBoundary>
                            <div
                                className="bg-white w-8 h-8 p-2 rounded-full cursor-pointer group hover:bg-blue-primary"
                                onClick={() => {
                                    setIsExpanded(true);
                                }}
                            >
                                <svg
                                    className="w-full h-full text-blue-light group-hover:text-white"
                                    viewBox="0 0 30 30"
                                    version="1.1"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <g
                                        stroke="none"
                                        strokeWidth="1"
                                        fill="none"
                                        fillRule="evenodd"
                                    >
                                        <g
                                            transform="translate(-881.000000, -354.000000)"
                                            fillRule="nonzero"
                                            className="fill-current"
                                        >
                                            <g transform="translate(881.000000, 354.000000)">
                                                <path d="M20.7692308,12.6923077 C20.7692308,10.46875 19.9789663,8.56670673 18.3984375,6.98617788 C16.8179087,5.40564904 14.9158654,4.61538462 12.6923077,4.61538462 C10.46875,4.61538462 8.56670673,5.40564904 6.98617788,6.98617788 C5.40564904,8.56670673 4.61538462,10.46875 4.61538462,12.6923077 C4.61538462,14.9158654 5.40564904,16.8179087 6.98617788,18.3984375 C8.56670673,19.9789663 10.46875,20.7692308 12.6923077,20.7692308 C14.9158654,20.7692308 16.8179087,19.9789663 18.3984375,18.3984375 C19.9789663,16.8179087 20.7692308,14.9158654 20.7692308,12.6923077 Z M30,27.6923077 C30,28.3173077 29.7716346,28.8581731 29.3149038,29.3149038 C28.8581731,29.7716346 28.3173077,30 27.6923077,30 C27.0432692,30 26.5024038,29.7716346 26.0697115,29.3149038 L19.8858173,23.1490385 C17.734375,24.6394231 15.3365385,25.3846154 12.6923077,25.3846154 C10.9735577,25.3846154 9.32992788,25.0510817 7.76141827,24.3840144 C6.19290865,23.7169471 4.84074519,22.8155048 3.70492788,21.6796875 C2.56911058,20.5438702 1.66766827,19.1917067 1.00060096,17.6231971 C0.333533654,16.0546875 0,14.4110577 0,12.6923077 C0,10.9735577 0.333533654,9.32992788 1.00060096,7.76141827 C1.66766827,6.19290865 2.56911058,4.84074519 3.70492788,3.70492788 C4.84074519,2.56911058 6.19290865,1.66766827 7.76141827,1.00060096 C9.32992788,0.333533654 10.9735577,0 12.6923077,0 C14.4110577,0 16.0546875,0.333533654 17.6231971,1.00060096 C19.1917067,1.66766827 20.5438702,2.56911058 21.6796875,3.70492788 C22.8155048,4.84074519 23.7169471,6.19290865 24.3840144,7.76141827 C25.0510817,9.32992788 25.3846154,10.9735577 25.3846154,12.6923077 C25.3846154,15.3365385 24.6394231,17.734375 23.1490385,19.8858173 L29.3329327,26.0697115 C29.7776442,26.5144231 30,27.0552885 30,27.6923077 Z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            {isExpanded && (
                                <>
                                    <div
                                        className={`absolute lg:fixed bg-transparent h-screen overflow-y-scroll z-50 w-full lg:w-1/2 xl:w-5/12 right-0 top-0 bottom-0 shadow-lg bg-white`}
                                    >
                                        <div className="container py-12 bg-blue-darker relative">
                                            <div className=" absolute right-6 top-6 ">
                                                <div
                                                    className="h-8 w-8 rounded-full group flex items-center justify-center cursor-pointer"
                                                    onClick={() =>
                                                        setIsExpanded(false)
                                                    }
                                                >
                                                    <span className="text-xl text-white group-hover:text-grey-200 m-0 inline-block">
                                                        &#10006;
                                                    </span>
                                                </div>
                                            </div>
                                            <div className="text-center mb-6   ">
                                                <h3 className="text-xl lg:text-2xl text-white">
                                                    What can we help you find?
                                                </h3>
                                            </div>
                                            <div className="px-6 lg:px-12">
                                                <SearchInput
                                                    setIsExpanded={
                                                        setIsExpanded
                                                    }
                                                    searchTerm={searchTerm}
                                                    setSearchTerm={
                                                        setSearchTerm
                                                    }
                                                />
                                            </div>
                                        </div>
                                        <div className={`bg-white py-6`}>
                                            {searchTerm && (
                                                <div className="container">
                                                    {isLoading && (
                                                        <>
                                                            <Loader />
                                                        </>
                                                    )}
                                                    {!isLoading && (
                                                        <>
                                                            <PagingInfo />
                                                            <ul className="text-grey-light list-none p-0 m-0 py-3 text-left">
                                                                {!results.length >
                                                                    0 && (
                                                                    <>
                                                                        <EmptyResults
                                                                            searchTerm={
                                                                                searchTerm
                                                                            }
                                                                        />
                                                                    </>
                                                                )}

                                                                {results.map(
                                                                    (r, i) => (
                                                                        <ResultItem
                                                                            key={
                                                                                i
                                                                            }
                                                                            result={
                                                                                r
                                                                            }
                                                                        />
                                                                    )
                                                                )}
                                                            </ul>
                                                            {!isLoading &&
                                                                results.length >
                                                                    0 &&
                                                                wasSearched && (
                                                                    <div className="flex justify-between items-center ">
                                                                        <div className="flex flex-col items-center justify-center">
                                                                            <Paging className="mb-2" />
                                                                            <PagingInfo />
                                                                        </div>
                                                                    </div>
                                                                )}
                                                        </>
                                                    )}
                                                </div>
                                            )}
                                        </div>
                                    </div>
                                    <div
                                        className="backdrop-blur bg-black/50 h-full w-full fixed inset-0"
                                        onClick={() => {
                                            setIsExpanded(false);
                                        }}
                                    ></div>
                                </>
                            )}
                        </ErrorBoundary>
                    );
                }}
            </WithSearch>
        </SearchProvider>
    );
}

const EmptyResults = ({ searchTerm }) => {
    return (
        <li>
            There are no results for{" "}
            <span className="font-bold">{searchTerm}</span>
        </li>
    );
};
const Loader = () => {
    return (
        <>
            <div
                id="spinner-loader"
                className="spinner-loader rounded-full w-8 h-8 mx-auto mt-6 animate-spin py-3"
            ></div>
        </>
    );
};
const ResultItem = ({ result }) => {
    let label;
    let labelColor;
    switch (result._meta.engine) {
        case "www-blog":
            labelColor =
                "bg-yellow-lighter border-yellow-light text-yellow-dark";
            label = "Armory.io";
            break;

        case "resources-site":
            labelColor = "bg-indigo-100 border-indigo-300";
            label = "Resouces";

            break;

        case "docs-site":
            labelColor = "bg-red-light border-red-neutral text-red-dark";
            label = "Docs";

            break;

        case "support-site":
            labelColor =
                "bg-green-light border-green-neutral text-green-darker";
            label = "Knowledge Base";

            break;

        default:
            labelColor = "bg-blue-secondary border-blue-light text-blue-light";
            label = "www.armory.io";

            break;
    }

    // console.log({ result });
    const title = result?.url_path_dir1?.raw
        ? result?.url_path_dir1?.raw
        : result._meta.engine;
    const url = result?.url?.raw ? result?.url?.raw : result?.url_path?.raw;
    return (
        <li className="mb-2 search-li py-3 border-b relative result-li">
            <div className="flex items-center mb-1">
                <div
                    className={`${labelColor} border-l-4 rounded px-2 inline-block`}
                >
                    <small className="uppercase text-[11px] m-0 block leading-loose">
                        {title === "support-site"
                            ? "Knowledge Base"
                            : title.replaceAll("-", " ")}
                    </small>
                </div>

                {result?.locked?.raw === "true" && (
                    <div className="px-2 ">
                        <svg
                            width="9px"
                            height="11px"
                            viewBox="0 0 9 11"
                            version="1.1"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <g
                                stroke="none"
                                strokeWidth="1"
                                fill="none"
                                fillRule="evenodd"
                            >
                                <g
                                    transform="translate(-94.000000, -739.000000)"
                                    fill="#B0B0B0"
                                    fillRule="nonzero"
                                >
                                    <g transform="translate(67.000000, 708.000000)">
                                        <g transform="translate(27.000000, 31.000000)">
                                            <path d="M2.5,5 L6.5,5 L6.5,3.5 C6.5,2.94791667 6.3046875,2.4765625 5.9140625,2.0859375 C5.5234375,1.6953125 5.05208333,1.5 4.5,1.5 C3.94791667,1.5 3.4765625,1.6953125 3.0859375,2.0859375 C2.6953125,2.4765625 2.5,2.94791667 2.5,3.5 L2.5,5 Z M9,5.75 L9,10.25 C9,10.4583333 8.92708333,10.6354167 8.78125,10.78125 C8.63541667,10.9270833 8.45833333,11 8.25,11 L0.75,11 C0.541666667,11 0.364583333,10.9270833 0.21875,10.78125 C0.0729166667,10.6354167 0,10.4583333 0,10.25 L0,5.75 C0,5.54166667 0.0729166667,5.36458333 0.21875,5.21875 C0.364583333,5.07291667 0.541666667,5 0.75,5 L1,5 L1,3.5 C1,2.54166667 1.34375,1.71875 2.03125,1.03125 C2.71875,0.34375 3.54166667,0 4.5,0 C5.45833333,0 6.28125,0.34375 6.96875,1.03125 C7.65625,1.71875 8,2.54166667 8,3.5 L8,5 L8.25,5 C8.45833333,5 8.63541667,5.07291667 8.78125,5.21875 C8.92708333,5.36458333 9,5.54166667 9,5.75 Z"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                )}
            </div>
            <div>
                <a href={url} className="block no-underline">
                    <h3
                        className="text-blue-lighter font-normal text-lg mb-0"
                        dangerouslySetInnerHTML={{
                            __html: result?.title?.snippet,
                        }}
                    ></h3>
                </a>
            </div>

            {result.meta_description && (
                <div
                    className="text-grey-lighter no-underline text-sm "
                    dangerouslySetInnerHTML={{
                        __html: result?.meta_description?.snippet,
                    }}
                ></div>
            )}
        </li>
    );
};
const SearchInput = ({ searchTerm, setSearchTerm, setIsExpanded }) => {
    return (
        <>
            <input
                autoFocus
                className="px-6 h-8 rounded-3xl placeholder:text-grey-light text-black w-full relative block z-20"
                type="text"
                value={searchTerm}
                onChange={(e) => {
                    setSearchTerm(e.target.value);
                }}
                placeholder="Search Armory..."
                // onBlur={() => {
                //     if (!searchTerm) {
                //         setIsExpanded(false);
                //     }
                // }}
            />
        </>
    );
};
