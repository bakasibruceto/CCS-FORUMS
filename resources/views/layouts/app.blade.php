<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->

    @vite(['resources/css/app.css', 'resources/css/a11y-dark.css', 'resources/js/app.js'])

    <!-- Styles -->
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- Styles -->
    <style>
        @tailwind base;
        @tailwind components;
        @tailwind utilities;

        pre code.hljs {
            display: block;
            overflow-x: auto;
            padding: 1em
        }

        code.hljs {
            padding: 3px 5px
        }

        pre code.hljs {
            display: block;
            overflow-x: auto;
            padding: 1em
        }

        code.hljs {
            padding: 3px 5px
        }

        .hljs {
            color: #b8bbc2;
            background: #1f2937
        }

        .hljs::selection,
        .hljs ::selection {
            background-color: #4d5666;
            color: #b8bbc2
        }

        /* purposely do not highlight these things */
        .hljs-formula,
        .hljs-params,
        .hljs-property {}

        /* base03 - #717885 -  Comments, Invisibles, Line Highlighting */
        .hljs-comment {
            color: #717885
        }

        /* base04 - #9a99a3 -  Dark Foreground (Used for status bars) */
        .hljs-tag {
            color: #9a99a3
        }

        /* base05 - #b8bbc2 -  Default Foreground, Caret, Delimiters, Operators */
        .hljs-subst,
        .hljs-punctuation,
        .hljs-operator {
            color: #b8bbc2
        }

        .hljs-operator {
            opacity: 0.7
        }

        /* base08 - Variables, XML Tags, Markup Link Text, Markup Lists, Diff Deleted */
        .hljs-bullet,
        .hljs-variable,
        .hljs-template-variable,
        .hljs-selector-tag,
        .hljs-name,
        .hljs-deletion {
            color: #d07346
        }

        /* base09 - Integers, Boolean, Constants, XML Attributes, Markup Link Url */
        .hljs-symbol,
        .hljs-number,
        .hljs-link,
        .hljs-attr,
        .hljs-variable.constant_,
        .hljs-literal {
            color: #f0a000
        }

        /* base0A - Classes, Markup Bold, Search Text Background */
        .hljs-title,
        .hljs-class .hljs-title,
        .hljs-title.class_ {
            color: #fbd461
        }

        .hljs-strong {
            font-weight: bold;
            color: #fbd461
        }

        /* base0B - Strings, Inherited Class, Markup Code, Diff Inserted */
        .hljs-code,
        .hljs-addition,
        .hljs-title.class_.inherited__,
        .hljs-string {
            color: #99bf52
        }

        /* base0C - Support, Regular Expressions, Escape Characters, Markup Quotes */
        /* guessing */
        .hljs-built_in,
        .hljs-doctag,
        .hljs-quote,
        .hljs-keyword.hljs-atrule,
        .hljs-regexp {
            color: #72b9bf
        }

        /* base0D - Functions, Methods, Attribute IDs, Headings */
        .hljs-function .hljs-title,
        .hljs-attribute,
        .ruby .hljs-property,
        .hljs-title.function_,
        .hljs-section {
            color: #5299bf
        }

        /* base0E - Keywords, Storage, Selector, Markup Italic, Diff Changed */
        /* .hljs-selector-id, */
        /* .hljs-selector-class, */
        /* .hljs-selector-attr, */
        /* .hljs-selector-pseudo, */
        .hljs-type,
        .hljs-template-tag,
        .diff .hljs-meta,
        .hljs-keyword {
            color: #9989cc
        }

        .hljs-emphasis {
            color: #9989cc;
            font-style: italic
        }

        .hljs-meta .hljs-keyword,
        .hljs-meta-keyword {
            font-weight: bold
        }
    </style>


    @livewireStyles
</head>

<body class="font-sans antialiased ">
    <x-banner />

    <div class="min-h-screen bg-gray-200 ">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
        <!-- Page Content -->
        <main class="flex flex-col min-h-screen">
            {{ $slot }}
        </main>
        <x-footer />
    </div>

    @livewireScripts
</body>

</html>
