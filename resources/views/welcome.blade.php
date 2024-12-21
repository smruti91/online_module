<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online Module</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">

    <link href="resources/css/bootstrap-icons.css" rel="stylesheet">

    <link href="resources/css/templatemo-topic-listing.css" rel="stylesheet">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */
            *,
            ::after,
            ::before {
                box-sizing: border-box;
                border-width: 0;
                border-style: solid;
                border-color: #e5e7eb
            }

            ::after,
            ::before {
                --tw-content: ''
            }

            :host,
            html {
                line-height: 1.5;
                -webkit-text-size-adjust: 100%;
                -moz-tab-size: 4;
                tab-size: 4;
                font-family: Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
                font-feature-settings: normal;
                font-variation-settings: normal;
                -webkit-tap-highlight-color: transparent
            }

            body {
                margin: 0;
                line-height: inherit
            }

            hr {
                height: 0;
                color: inherit;
                border-top-width: 1px
            }

            abbr:where([title]) {
                -webkit-text-decoration: underline dotted;
                text-decoration: underline dotted
            }

            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-size: inherit;
                font-weight: inherit
            }

            a {
                color: inherit;
                text-decoration: inherit
            }

            b,
            strong {
                font-weight: bolder
            }

            code,
            kbd,
            pre,
            samp {
                font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
                font-feature-settings: normal;
                font-variation-settings: normal;
                font-size: 1em
            }

            small {
                font-size: 80%
            }

            sub,
            sup {
                font-size: 75%;
                line-height: 0;
                position: relative;
                vertical-align: baseline
            }

            sub {
                bottom: -.25em
            }

            sup {
                top: -.5em
            }

            table {
                text-indent: 0;
                border-color: inherit;
                border-collapse: collapse
            }

            button,
            input,
            optgroup,
            select,
            textarea {
                font-family: inherit;
                font-feature-settings: inherit;
                font-variation-settings: inherit;
                font-size: 100%;
                font-weight: inherit;
                line-height: inherit;
                color: inherit;
                margin: 0;
                padding: 0
            }

            button,
            select {
                text-transform: none
            }

            [type=button],
            [type=reset],
            [type=submit],
            button {
                -webkit-appearance: button;
                background-color: transparent;
                background-image: none
            }

            :-moz-focusring {
                outline: auto
            }

            :-moz-ui-invalid {
                box-shadow: none
            }

            progress {
                vertical-align: baseline
            }

            ::-webkit-inner-spin-button,
            ::-webkit-outer-spin-button {
                height: auto
            }

            [type=search] {
                -webkit-appearance: textfield;
                outline-offset: -2px
            }

            ::-webkit-search-decoration {
                -webkit-appearance: none
            }

            ::-webkit-file-upload-button {
                -webkit-appearance: button;
                font: inherit
            }

            summary {
                display: list-item
            }

            blockquote,
            dd,
            dl,
            figure,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            hr,
            p,
            pre {
                margin: 0
            }

            fieldset {
                margin: 0;
                padding: 0
            }

            legend {
                padding: 0
            }

            menu,
            ol,
            ul {
                list-style: none;
                margin: 0;
                padding: 0
            }

            dialog {
                padding: 0
            }

            textarea {
                resize: vertical
            }

            input::placeholder,
            textarea::placeholder {
                opacity: 1;
                color: #9ca3af
            }

            [role=button],
            button {
                cursor: pointer
            }

            :disabled {
                cursor: default
            }

            audio,
            canvas,
            embed,
            iframe,
            img,
            object,
            svg,
            video {
                display: block;
                vertical-align: middle
            }

            img,
            video {
                max-width: 100%;
                height: auto
            }

            [hidden] {
                display: none
            }

            *,
            ::before,
            ::after {
                --tw-border-spacing-x: 0;
                --tw-border-spacing-y: 0;
                --tw-translate-x: 0;
                --tw-translate-y: 0;
                --tw-rotate: 0;
                --tw-skew-x: 0;
                --tw-skew-y: 0;
                --tw-scale-x: 1;
                --tw-scale-y: 1;
                --tw-pan-x: ;
                --tw-pan-y: ;
                --tw-pinch-zoom: ;
                --tw-scroll-snap-strictness: proximity;
                --tw-gradient-from-position: ;
                --tw-gradient-via-position: ;
                --tw-gradient-to-position: ;
                --tw-ordinal: ;
                --tw-slashed-zero: ;
                --tw-numeric-figure: ;
                --tw-numeric-spacing: ;
                --tw-numeric-fraction: ;
                --tw-ring-inset: ;
                --tw-ring-offset-width: 0px;
                --tw-ring-offset-color: #fff;
                --tw-ring-color: rgb(59 130 246 / 0.5);
                --tw-ring-offset-shadow: 0 0 #0000;
                --tw-ring-shadow: 0 0 #0000;
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                --tw-blur: ;
                --tw-brightness: ;
                --tw-contrast: ;
                --tw-grayscale: ;
                --tw-hue-rotate: ;
                --tw-invert: ;
                --tw-saturate: ;
                --tw-sepia: ;
                --tw-drop-shadow: ;
                --tw-backdrop-blur: ;
                --tw-backdrop-brightness: ;
                --tw-backdrop-contrast: ;
                --tw-backdrop-grayscale: ;
                --tw-backdrop-hue-rotate: ;
                --tw-backdrop-invert: ;
                --tw-backdrop-opacity: ;
                --tw-backdrop-saturate: ;
                --tw-backdrop-sepia:
            }

            ::backdrop {
                --tw-border-spacing-x: 0;
                --tw-border-spacing-y: 0;
                --tw-translate-x: 0;
                --tw-translate-y: 0;
                --tw-rotate: 0;
                --tw-skew-x: 0;
                --tw-skew-y: 0;
                --tw-scale-x: 1;
                --tw-scale-y: 1;
                --tw-pan-x: ;
                --tw-pan-y: ;
                --tw-pinch-zoom: ;
                --tw-scroll-snap-strictness: proximity;
                --tw-gradient-from-position: ;
                --tw-gradient-via-position: ;
                --tw-gradient-to-position: ;
                --tw-ordinal: ;
                --tw-slashed-zero: ;
                --tw-numeric-figure: ;
                --tw-numeric-spacing: ;
                --tw-numeric-fraction: ;
                --tw-ring-inset: ;
                --tw-ring-offset-width: 0px;
                --tw-ring-offset-color: #fff;
                --tw-ring-color: rgb(59 130 246 / 0.5);
                --tw-ring-offset-shadow: 0 0 #0000;
                --tw-ring-shadow: 0 0 #0000;
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                --tw-blur: ;
                --tw-brightness: ;
                --tw-contrast: ;
                --tw-grayscale: ;
                --tw-hue-rotate: ;
                --tw-invert: ;
                --tw-saturate: ;
                --tw-sepia: ;
                --tw-drop-shadow: ;
                --tw-backdrop-blur: ;
                --tw-backdrop-brightness: ;
                --tw-backdrop-contrast: ;
                --tw-backdrop-grayscale: ;
                --tw-backdrop-hue-rotate: ;
                --tw-backdrop-invert: ;
                --tw-backdrop-opacity: ;
                --tw-backdrop-saturate: ;
                --tw-backdrop-sepia:
            }

            .absolute {
                position: absolute
            }

            .relative {
                position: relative
            }

            .-left-20 {
                left: -5rem
            }

            .top-0 {
                top: 0px
            }

            .-bottom-16 {
                bottom: -4rem
            }

            .-left-16 {
                left: -4rem
            }

            .-mx-3 {
                margin-left: -0.75rem;
                margin-right: -0.75rem
            }

            .mt-4 {
                margin-top: 1rem
            }

            .mt-6 {
                margin-top: 1.5rem
            }

            .flex {
                display: flex
            }

            .grid {
                display: grid
            }

            .hidden {
                display: none
            }

            .aspect-video {
                aspect-ratio: 16 / 9
            }

            .size-12 {
                width: 3rem;
                height: 3rem
            }

            .size-5 {
                width: 1.25rem;
                height: 1.25rem
            }

            .size-6 {
                width: 1.5rem;
                height: 1.5rem
            }

            .h-12 {
                height: 3rem
            }

            .h-40 {
                height: 10rem
            }

            .h-full {
                height: 100%
            }

            .min-h-screen {
                min-height: 100vh
            }

            .w-full {
                width: 100%
            }

            .w-\[calc\(100\%\+8rem\)\] {
                width: calc(100% + 8rem)
            }

            .w-auto {
                width: auto
            }

            .max-w-\[877px\] {
                max-width: 877px
            }

            .max-w-2xl {
                max-width: 42rem
            }

            .flex-1 {
                flex: 1 1 0%
            }

            .shrink-0 {
                flex-shrink: 0
            }

            .grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }

            .flex-col {
                flex-direction: column
            }

            .items-start {
                align-items: flex-start
            }

            .items-center {
                align-items: center
            }

            .items-stretch {
                align-items: stretch
            }

            .justify-end {
                justify-content: flex-end
            }

            .justify-center {
                justify-content: center
            }

            .gap-2 {
                gap: 0.5rem
            }

            .gap-4 {
                gap: 1rem
            }

            .gap-6 {
                gap: 1.5rem
            }

            .self-center {
                align-self: center
            }

            .overflow-hidden {
                overflow: hidden
            }

            .rounded-\[10px\] {
                border-radius: 10px
            }

            .rounded-full {
                border-radius: 9999px
            }

            .rounded-lg {
                border-radius: 0.5rem
            }

            .rounded-md {
                border-radius: 0.375rem
            }

            .rounded-sm {
                border-radius: 0.125rem
            }

            .bg-\[\#FF2D20\]\/10 {
                background-color: rgb(255 45 32 / 0.1)
            }

            .bg-white {
                --tw-bg-opacity: 1;
                background-color: rgb(255 255 255 / var(--tw-bg-opacity))
            }

            .bg-gradient-to-b {
                background-image: linear-gradient(to bottom, var(--tw-gradient-stops))
            }

            .from-transparent {
                --tw-gradient-from: transparent var(--tw-gradient-from-position);
                --tw-gradient-to: rgb(0 0 0 / 0) var(--tw-gradient-to-position);
                --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to)
            }

            .via-white {
                --tw-gradient-to: rgb(255 255 255 / 0) var(--tw-gradient-to-position);
                --tw-gradient-stops: var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)
            }

            .to-white {
                --tw-gradient-to: #fff var(--tw-gradient-to-position)
            }

            .stroke-\[\#FF2D20\] {
                stroke: #FF2D20
            }

            .object-cover {
                object-fit: cover
            }

            .object-top {
                object-position: top
            }

            .p-6 {
                padding: 1.5rem
            }

            .px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .py-10 {
                padding-top: 2.5rem;
                padding-bottom: 2.5rem
            }

            .px-3 {
                padding-left: 0.75rem;
                padding-right: 0.75rem
            }

            .py-16 {
                padding-top: 4rem;
                padding-bottom: 4rem
            }

            .py-2 {
                padding-top: 0.5rem;
                padding-bottom: 0.5rem
            }

            .pt-3 {
                padding-top: 0.75rem
            }

            .text-center {
                text-align: center
            }

            .font-sans {
                font-family: Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji
            }

            .text-sm {
                font-size: 0.875rem;
                line-height: 1.25rem
            }

            .text-sm\/relaxed {
                font-size: 0.875rem;
                line-height: 1.625
            }

            .text-xl {
                font-size: 1.25rem;
                line-height: 1.75rem
            }

            .font-semibold {
                font-weight: 600
            }

            .text-black {
                --tw-text-opacity: 1;
                color: rgb(0 0 0 / var(--tw-text-opacity))
            }

            .text-white {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .underline {
                -webkit-text-decoration-line: underline;
                text-decoration-line: underline
            }

            .antialiased {
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale
            }

            .shadow-\[0px_14px_34px_0px_rgba\(0\2c 0\2c 0\2c 0\.08\)\] {
                --tw-shadow: 0px 14px 34px 0px rgba(0, 0, 0, 0.08);
                --tw-shadow-colored: 0px 14px 34px 0px var(--tw-shadow-color);
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
            }

            .ring-1 {
                --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
            }

            .ring-transparent {
                --tw-ring-color: transparent
            }

            .ring-white\/\[0\.05\] {
                --tw-ring-color: rgb(255 255 255 / 0.05)
            }

            .drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.06\)\] {
                --tw-drop-shadow: drop-shadow(0px 4px 34px rgba(0, 0, 0, 0.06));
                filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)
            }

            .drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.25\)\] {
                --tw-drop-shadow: drop-shadow(0px 4px 34px rgba(0, 0, 0, 0.25));
                filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)
            }

            .transition {
                transition-property: color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;
                transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
                transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                transition-duration: 150ms
            }

            .duration-300 {
                transition-duration: 300ms
            }

            .selection\:bg-\[\#FF2D20\] *::selection {
                --tw-bg-opacity: 1;
                background-color: rgb(255 45 32 / var(--tw-bg-opacity))
            }

            .selection\:text-white *::selection {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .selection\:bg-\[\#FF2D20\]::selection {
                --tw-bg-opacity: 1;
                background-color: rgb(255 45 32 / var(--tw-bg-opacity))
            }

            .selection\:text-white::selection {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .hover\:text-black:hover {
                --tw-text-opacity: 1;
                color: rgb(0 0 0 / var(--tw-text-opacity))
            }

            .hover\:text-black\/70:hover {
                color: rgb(0 0 0 / 0.7)
            }

            .hover\:ring-black\/20:hover {
                --tw-ring-color: rgb(0 0 0 / 0.2)
            }

            .focus\:outline-none:focus {
                outline: 2px solid transparent;
                outline-offset: 2px
            }

            .focus-visible\:ring-1:focus-visible {
                --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
            }

            .focus-visible\:ring-\[\#FF2D20\]:focus-visible {
                --tw-ring-opacity: 1;
                --tw-ring-color: rgb(255 45 32 / var(--tw-ring-opacity))
            }

            @media (min-width: 640px) {
                .sm\:size-16 {
                    width: 4rem;
                    height: 4rem
                }

                .sm\:size-6 {
                    width: 1.5rem;
                    height: 1.5rem
                }

                .sm\:pt-5 {
                    padding-top: 1.25rem
                }
            }

            @media (min-width: 768px) {
                .md\:row-span-3 {
                    grid-row: span 3 / span 3
                }
            }

            @media (min-width: 1024px) {
                .lg\:col-start-2 {
                    grid-column-start: 2
                }

                .lg\:h-16 {
                    height: 4rem
                }

                .lg\:max-w-7xl {
                    max-width: 80rem
                }

                .lg\:grid-cols-3 {
                    grid-template-columns: repeat(3, minmax(0, 1fr))
                }

                .lg\:grid-cols-2 {
                    grid-template-columns: repeat(2, minmax(0, 1fr))
                }

                .lg\:flex-col {
                    flex-direction: column
                }

                .lg\:items-end {
                    align-items: flex-end
                }

                .lg\:justify-center {
                    justify-content: center
                }

                .lg\:gap-8 {
                    gap: 2rem
                }

                .lg\:p-10 {
                    padding: 2.5rem
                }

                .lg\:pb-10 {
                    padding-bottom: 2.5rem
                }

                .lg\:pt-0 {
                    padding-top: 0px
                }

                .lg\:text-\[\#FF2D20\] {
                    --tw-text-opacity: 1;
                    color: rgb(255 45 32 / var(--tw-text-opacity))
                }
            }

            @media (prefers-color-scheme: dark) {
                .dark\:block {
                    display: block
                }

                .dark\:hidden {
                    display: none
                }

                .dark\:bg-black {
                    --tw-bg-opacity: 1;
                    background-color: rgb(0 0 0 / var(--tw-bg-opacity))
                }

                .dark\:bg-zinc-900 {
                    --tw-bg-opacity: 1;
                    background-color: rgb(24 24 27 / var(--tw-bg-opacity))
                }

                .dark\:via-zinc-900 {
                    --tw-gradient-to: rgb(24 24 27 / 0) var(--tw-gradient-to-position);
                    --tw-gradient-stops: var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)
                }

                .dark\:to-zinc-900 {
                    --tw-gradient-to: #18181b var(--tw-gradient-to-position)
                }

                .dark\:text-white\/50 {
                    color: rgb(255 255 255 / 0.5)
                }

                .dark\:text-white {
                    --tw-text-opacity: 1;
                    color: rgb(255 255 255 / var(--tw-text-opacity))
                }

                .dark\:text-white\/70 {
                    color: rgb(255 255 255 / 0.7)
                }

                .dark\:ring-zinc-800 {
                    --tw-ring-opacity: 1;
                    --tw-ring-color: rgb(39 39 42 / var(--tw-ring-opacity))
                }

                .dark\:hover\:text-white:hover {
                    --tw-text-opacity: 1;
                    color: rgb(255 255 255 / var(--tw-text-opacity))
                }

                .dark\:hover\:text-white\/70:hover {
                    color: rgb(255 255 255 / 0.7)
                }

                .dark\:hover\:text-white\/80:hover {
                    color: rgb(255 255 255 / 0.8)
                }

                .dark\:hover\:ring-zinc-700:hover {
                    --tw-ring-opacity: 1;
                    --tw-ring-color: rgb(63 63 70 / var(--tw-ring-opacity))
                }

                .dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible {
                    --tw-ring-opacity: 1;
                    --tw-ring-color: rgb(255 45 32 / var(--tw-ring-opacity))
                }

                .dark\:focus-visible\:ring-white:focus-visible {
                    --tw-ring-opacity: 1;
                    --tw-ring-color: rgb(255 255 255 / var(--tw-ring-opacity))
                }
            }

        </style>
    @endif
</head>

<body id="top">

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <i class="bi-book"></i>
                    <span>Online Module</span>
                </a>

                <div class="d-lg-none ms-auto me-4">
                    <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Dashboard</a>
                        </li>

                        <!-- <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_2">Browse Topics</a>
                            </li> -->

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_3">How it works</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_4">FAQs</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">Contact</a>
                        </li>


                    </ul>

                    <div class="d-none d-lg-block">
                        <!-- <a href="#top" class="navbar-icon bi-person smoothscroll"></a> -->
                        <img src="resources/images/lg1.png" class="smoothscroll" alt="logo"
                            style="width: 15%;margin-left: 85%;">
                    </div>
                </div>
            </div>
        </nav>

        <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
            <div class="container" style="height: 75vh;margin-top: 60px;">
                <div class="row">
                    <div class="col-lg-12 d-flex">
                        <div class="col-lg-4">
                            <img src="resources/images/lg1.png" class=" img-fluid" alt="">
                        </div>
                        <div class="col-lg-8">

                            <div class="container" id="rightContent" style="background-color: aliceblue;height:80vh;">
                                <div class="moduleWrap" style="">
                                    <a href="{{ url('course_module') }}" style="width:40%;margin-left: 35%;"> <input
                                            type="button" class="btn module_btn mt-3"
                                            value=" Search Course offered"></a>
                                    <div class="row mt-2">
                                        <div class="col-12" style="margin-left: 30%;">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input courseSearch" type="radio"
                                                    name="searchCourse" id="moduleCourse" value="moduleWise">
                                                <label class="form-check-label" for="inlineRadio1">Module Wise</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input courseSearch" type="radio"
                                                    name="searchCourse" id="searchCourse" value="searchCourse">
                                                <label class="form-check-label" for="inlineRadio2">Subject Wise</label>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="courseModuleWrap mt-3 d-none">
                                        <button class="btn btn-primary moduleName" data-id="1">Orientation Module</button>
                                        <button class="btn btn-primary moduleName2 refresh" data-id="2">Refresher Module</button>
                                        <button class="btn btn-primary moduleName2 thematic" data-id="3">Thematic Module</button>
                                        <button class="btn btn-primary moduleName2 custom" data-id="4">Custom Module</button>
                                    </div>

                                    <div class="courseWrap2 d-none mt-2">
                                        <div class="row">

                                            <div class="col-6" style="border-radius: 5px;

    height: 64%;
    box-shadow: brown;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px">
                                                <h1 style="font-size: 25px;
    text-align: center;
    font-weight: 500;" >courses</h1>
                                                   <hr>
                                                <ul>
                                                 <li class="courses" style="cursor: pointer; font-size: 15px;color: black;" data-course-id = 1 >Training Program on Financial matters for different department officers</li>
                                                </ul>
                                            </div>
                                            <div class="col-6 ml-1" style="box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;">

                                                <h1 class="mt-2" style="font-size: 25px;
                                                text-align: center;
                                                font-weight: 500;" >Programs</h1>
                                                <hr>
                                                <div id="related-programs" style="border: 1px solid rgb(248, 242, 242);height: 75%;overflow: auto;" ></div>
                                            </div>
                                        </div>

                                    </div>

                                    {{-- <div class="row">
                                            <div class="col-2 d-flex justify-content-center align-items-center ">
                                                <img src="resources/images/icons/book.png" alt="login" style="width:40px">
                                            </div>
                                            <div class="col-8">
                                                <a href="{{url('course_module')}}" style="width:100%"> <input type="button"
                                                        class="btn module_btn" value="Online Modules"></a>
                                            </div>
                                        </div> --}}
                                    {{-- login panel --}}
                                    {{-- <div class="row">
                                            <div class="col-2 d-flex justify-content-center align-items-center ">
                                                <!-- <i class="bi-box-arrow-in-right moduleIcon"></i> -->
                                                <img src="resources/images/icons/login.png" alt="login" style="width:40px">
                                            </div>
                                            <div class="col-8">
                                            <a href="{{route('login')}}" style="width:100%"><input type="button" class="btn module_btn" value="Login / Register"></a>
                                            </div>
                                        </div> --}}


                                </div>

                            </div>
                        </div>

                    </div>
                </div>
        </section>

        <section class="timeline-section section-padding" id="section_3">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="text-white mb-4">How does it work?</h1>
                    </div>

                    <div class="col-lg-10 col-12 mx-auto">
                        <div class="timeline-container">
                            <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                                <div class="list-progress">
                                    <div class="inner"></div>
                                </div>

                                <li>
                                    <h4 class="text-white mb-3">Register </h4>

                                    <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Reiciendis, cumque magnam? Sequi, cupiditate quibusdam alias illum sed esse ad
                                        dignissimos libero sunt, quisquam numquam aliquam? Voluptas, accusamus omnis?
                                    </p>

                                    <div class="icon-holder">
                                        <i class="bi-person-circle"></i>
                                    </div>
                                </li>

                                <li>
                                    <h4 class="text-white mb-3">Select Module & Send Request to Enroll &amp; Wait for
                                        Approval</h4>

                                    <p class="text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                        Sint animi necessitatibus aperiam repudiandae nam omnis est vel quo, nihil
                                        repellat quia velit error modi earum similique odit labore. Doloremque,
                                        repudiandae?</p>

                                    <div class="icon-holder">
                                        <i class="bi-bookmark"></i>
                                    </div>
                                </li>

                                <li>
                                    <h4 class="text-white mb-3">Read &amp; Enjoy</h4>

                                    <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                        Animi vero quisquam, rem assumenda similique voluptas distinctio, iste est hic
                                        eveniet debitis ut ducimus beatae id? Quam culpa deleniti officiis autem?</p>

                                    <div class="icon-holder">
                                        <i class="bi-book"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="faq-section section-padding" id="section_4">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12">
                        <h2 class="mb-4">Frequently Asked Questions</h2>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-lg-5 col-12">
                        <img src="resources/images/faq_graphic.jpg" class="img-fluid" alt="FAQs">
                    </div>

                    <div class="col-lg-6 col-12 m-auto">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        What is Online Module?
                                    </button>
                                </h2>

                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi vero quisquam,
                                        rem assumenda similique voluptas distinctio, iste est hic eveniet debitis ut
                                        ducimus beatae id? Quam culpa deleniti officiis autem?
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        How to Register in Online Module?
                                    </button>
                                </h2>

                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi vero quisquam,
                                        rem assumenda similique voluptas distinctio, iste est hic eveniet debitis ut
                                        ducimus beatae id? Quam culpa deleniti officiis autem?
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        How to avail training after registration?
                                    </button>
                                </h2>

                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi vero quisquam,
                                        rem assumenda similique voluptas distinctio, iste est hic eveniet debitis ut
                                        ducimus beatae id? Quam culpa deleniti officiis autem?
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="contact-section section-padding section-bg" id="section_5">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-5">Contact Us</h2>
                    </div>

                    <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                        <iframe class="google-map"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11400.763950128196!2d85.813813!3d20.308991!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a1909b6becef969%3A0x1e98ae9e0901e35c!2sMadhusudan%20Das%20Regional%20Academy%20of%20Financial%20Management%20(MDRAFM)!5e1!3m2!1sen!2sin!4v1732251097338!5m2!1sen!2sin"
                            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>


                    <div class="col-lg-6 col-md-6 col-12 mx-auto">
                        <h4 class="mb-3">Madhusudan Das Regional Academy of Financial Management (MDRAFM)</h4>

                        <p>Chandrasekharpur, Bhubaneswar, Odisha 751013</p>

                        <hr>

                        <p class="d-flex align-items-center mb-1">
                            <span class="me-2">Phone</span>

                            <a href="tel: 110-220-3400" class="site-footer-link">
                                0674-2300394
                            </a>
                        </p>

                        <p class="d-flex align-items-center">
                            <span class="me-2">Email</span>

                            <a href="mailto:mdrafm@odisha.gov.in" class="site-footer-link">
                                mdrafm@odisha.gov.in
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-12 mb-4 pb-2">
                    <a class="navbar-brand mb-2" href="index.html">
                        <i class="bi-back"></i>
                        <span>Online Module</span>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <h6 class="site-footer-title mb-3">Resources</h6>

                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Dashboard</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">How it works</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">FAQs</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">
                    <h6 class="site-footer-title mb-3">Information</h6>

                    <p class="text-white d-flex mb-1">
                        <a href="tel: 305-240-9671" class="site-footer-link">
                            0674-2300394
                        </a>
                    </p>

                    <p class="text-white d-flex">
                        <a href="mailto:info@company.com" class="site-footer-link">
                            mdrafm@odisha.gov.in
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">
                    <!-- <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            English</button>

                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" type="button">Thai</button></li>

                                <li><button class="dropdown-item" type="button">Myanmar</button></li>

                                <li><button class="dropdown-item" type="button">Arabic</button></li>
                            </ul>
                        </div> -->

                    <p class="copyright-text mt-lg-5 mt-4">Copyright © 2024 mdrafm. All rights reserved.
                        <!-- <br><br>Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a> Distribution <a href="https://themewagon.com">ThemeWagon</a></p> -->

                </div>

            </div>
        </div>
    </footer>


    <!-- JAVASCRIPT FILES -->
    <script src="resources/js/jquery.min.js"></script>
    <script src="resources/js/bootstrap.bundle.min.js"></script>
    <script src="resources/js/jquery.sticky.js"></script>
    <script src="resources/js/click-scroll.js"></script>
    <script src="resources/js/custom.js"></script>
    <script>
        $('.courseSearch').click(function() {
            let course = $(this).val();
            console.log(course);
            if( course=='moduleWise'){

                $('.courseModuleWrap').removeClass('d-none');
            }else{
                $('.courseModuleWrap').addClass('d-none');
            }
        })

        $('.moduleName').click(function(){
            let module_id = $(this).attr('data-id');
            console.log(module_id);

            if(module_id == 1){
              $('.moduleName2').addClass('d-none');
              $('.courseWrap2').removeClass('d-none');

            }
        })

        $('.courses').on('click', function() {

            const courseId = $(this).attr('data-course-id');

            $.ajax({
            url: "{{ url('/course') }}/" + courseId + "/programs",
            type: "GET",
            success: function (response) {
                if (response.status === 'success') {
                    let programs = response.programs;
                    let html = '';

                    if (programs.length > 0) {
                        html += '<ul class="list-group">';
                        programs.forEach(function (program) {
                            html += `<li class="list-group-item program-item" data-program-id="${program.id}" style="background-color: #4d57cb;color: #ffffff;margin-bottom: 10px;cursor: pointer;font-size:13px" >
                                ${program.program_name}</li>`;
                        });
                        html += '</ul>';
                    } else {
                        html = '<p>No related programs found.</p>';
                    }

                    $('#related-programs').html(html);
                } else {
                    $('#related-programs').html('<p>Error fetching data. Please try again.</p>');
                }
            },
            error: function () {
                $('#related-programs').html('<p>An error occurred. Please try again.</p>');
            }
        });


        });

    </script>
</body>

</html>
