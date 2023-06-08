import React, { useState, useRef, useEffect } from "react";

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
// import { Layout, MultiCheckboxFacet } from "@elastic/react-search-ui-views";
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
};

export default function Page() {
    return (
        <SearchProvider config={config}>
            <WithSearch
                mapContextToProps={({
                    wasSearched,
                    searchTerm,
                    setSearchTerm,
                    results,
                    isLoading,
                    resultsPerPage,
                    facets,
                }) => ({
                    wasSearched,
                    searchTerm,
                    setSearchTerm,
                    results,
                    isLoading,
                    resultsPerPage,
                    facets,
                })}
            >
                {({
                    wasSearched,
                    searchTerm,
                    setSearchTerm,
                    results,
                    isLoading,
                    resultsPerPage,
                    facets,
                }) => {
                    return (
                        <ErrorBoundary>
                            <div className="py-12 bg-purple-dark">
                                <div className="container">
                                    <div className="text-center mb-6">
                                        <h1 className="text-white m-0 text-2xl md:text-5xl">
                                            What can we help you find?
                                        </h1>
                                    </div>
                                    <div className="flex justify-center">
                                        <div className="w-11/12 lg:w-2/3">
                                            <input
                                                autoFocus
                                                className="p-3 rounded-3xl placeholder:text-grey-light text-black w-full relative z-20"
                                                type="text"
                                                value={searchTerm}
                                                onChange={(e) => {
                                                    setSearchTerm(
                                                        e.target.value
                                                    );
                                                }}
                                                placeholder="Search Armory..."
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                {
                                    <div className="py-12 lg:py-20 bg-white ">
                                        <div className="container">
                                            <div className="flex justify-center flex-wrap -mx-6">
                                                <div className="w-11/12 lg:w-1/3 px-6 mb-12 lg:mb-0 ">
                                                    {isLoading && (
                                                        <>
                                                            <div
                                                                id="spinner-loader"
                                                                className="spinner-loader rounded-full w-12 h-12 mx-auto  animate-spin"
                                                            ></div>
                                                        </>
                                                    )}
                                                    {results.length > 0 &&
                                                        !isLoading && (
                                                            <>
                                                                {getFacetFields().map(
                                                                    (field) => {
                                                                        let label =
                                                                            "";

                                                                        switch (
                                                                            field
                                                                        ) {
                                                                            case "url_host":
                                                                                label =
                                                                                    "Sites";
                                                                                break;
                                                                            case "url_path_dir1":
                                                                                label =
                                                                                    "categories";
                                                                                break;
                                                                        }

                                                                        return (
                                                                            <Facet
                                                                                // mapContextToProps={(
                                                                                //     context
                                                                                // ) => {
                                                                                //     // return context;
                                                                                //     return {
                                                                                //         ...context,
                                                                                //         facets: {
                                                                                //             ...(context.facets ||
                                                                                //                 {}),
                                                                                //             [field]:
                                                                                //                 context.facets[
                                                                                //                     field
                                                                                //                 ].map(
                                                                                //                     (
                                                                                //                         s
                                                                                //                     ) => {
                                                                                //                         return {
                                                                                //                             ...s,
                                                                                //                             data: s.data.map(
                                                                                //                                 (
                                                                                //                                     d
                                                                                //                                 ) => ({
                                                                                //                                     ...d,
                                                                                //                                     label: d.value.replaceAll(
                                                                                //                                         "-",
                                                                                //                                         " "
                                                                                //                                     ),
                                                                                //                                 })
                                                                                //                             ),
                                                                                //                         };
                                                                                //                     }
                                                                                //                 ),
                                                                                //         },
                                                                                //     };
                                                                                // }}
                                                                                key={
                                                                                    field
                                                                                }
                                                                                field={
                                                                                    field
                                                                                }
                                                                                label={
                                                                                    label
                                                                                }
                                                                            />
                                                                        );
                                                                    }
                                                                )}
                                                            </>
                                                        )}
                                                </div>
                                                <div className="w-11/12 lg:w-2/3 px-6 relative border-t lg:border-t-0 lg:border-l py-12 lg:py-0">
                                                    {isLoading && (
                                                        <>
                                                            <div
                                                                id="spinner-loader"
                                                                className="spinner-loader rounded-full w-12 h-12 mx-auto  animate-spin"
                                                            ></div>
                                                        </>
                                                    )}
                                                    {!isLoading &&
                                                        results.length > 0 &&
                                                        wasSearched && (
                                                            <div className="lg:absolute w-40 top-0 right-0 z-20 mb-12 lg:mb-0 ">
                                                                <Sorting
                                                                    label={
                                                                        "Sort by"
                                                                    }
                                                                    sortOptions={buildSortOptionsFromConfig()}
                                                                />
                                                            </div>
                                                        )}
                                                    {!isLoading &&
                                                        results.length > 0 &&
                                                        wasSearched && (
                                                            <>
                                                                {/* <Paging /> */}
                                                                <PagingInfo />
                                                            </>
                                                        )}

                                                    {wasSearched && !isLoading && (
                                                        <ul className="text-grey-light list-none p-0 m-0 py-3 text-left">
                                                            {!results.length >
                                                                0 && (
                                                                <NoResults
                                                                    searchTerm={
                                                                        searchTerm
                                                                    }
                                                                />
                                                            )}
                                                            {results.map(
                                                                (r) => {
                                                                    return (
                                                                        <ResultItem
                                                                            key={
                                                                                r
                                                                                    .id
                                                                                    .raw
                                                                            }
                                                                            r={
                                                                                r
                                                                            }
                                                                        />
                                                                    );
                                                                }
                                                            )}
                                                        </ul>
                                                    )}

                                                    {!isLoading &&
                                                        results.length > 0 &&
                                                        wasSearched && (
                                                            <div className="flex justify-between items-center">
                                                                <div>
                                                                    <Paging />
                                                                    {/* <PagingInfo /> */}
                                                                </div>
                                                                <div>
                                                                    <ResultsPerPage />
                                                                </div>
                                                            </div>
                                                        )}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                }
                            </div>
                        </ErrorBoundary>
                    );
                }}
            </WithSearch>
        </SearchProvider>
    );
}

const NoResults = ({ searchTerm }) => {
    return (
        <li>
            <h3>
                Sorry, your search for "{searchTerm}" did not return any
                results.
            </h3>
            <p>
                <strong> Search Suggestions:</strong>
            </p>
            <ul>
                <li>Check your spelling</li>
                <li>Try more general words</li>
                <li>Remove advanced characters such as + - | " etc</li>
            </ul>
        </li>
    );
};
const ResultItem = ({ r }) => {
    let label;
    let labelColor;
    switch (r._meta.engine) {
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
    const title = r?.url_path_dir1?.raw
        ? r?.url_path_dir1?.raw
        : r._meta.engine;
    const url = r?.url?.raw ? r?.url?.raw : r?.url_path?.raw;
    return (
        <li className="mb-2 search-li py-3 border-b relative result-li">
            <div className="flex items-center mb-1">
                <div
                    className={`${labelColor} border-l-4 rounded px-2 inline-block`}
                >
                    <small className="uppercase text-[12px] m-0 block leading-loose">
                        {title === "support-site"
                            ? "Knowledge Base"
                            : title.replaceAll("-", " ")}
                    </small>
                </div>

                {r?.locked?.raw === "true" && (
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
                        className="text-blue-lighter font-normal text-xl mb-0"
                        dangerouslySetInnerHTML={{
                            __html: r?.title?.snippet,
                        }}
                    ></h3>
                </a>
            </div>

            {r.meta_description && (
                <div
                    className="text-grey-lighter no-underline text-sm "
                    dangerouslySetInnerHTML={{
                        __html: r?.meta_description?.snippet,
                    }}
                ></div>
            )}
        </li>
    );
};
