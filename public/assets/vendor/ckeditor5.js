
let init_data = document.getElementById("editor").value;

import {
    ClassicEditor,
    AccessibilityHelp,
    Alignment,
    Autoformat,
    AutoImage,
    AutoLink,
    Autosave,
    BalloonToolbar,
    BlockQuote,
    Bold,
    CloudServices,
    Code,
    CodeBlock,
    Essentials,
    FindAndReplace,
    FontBackgroundColor,
    FontColor,
    FontFamily,
    FontSize,
    FullPage,
    GeneralHtmlSupport,
    Heading,
    Highlight,
    HorizontalLine,
    HtmlComment,
    HtmlEmbed,
    ImageBlock,
    ImageCaption,
    ImageInline,
    ImageInsert,
    ImageInsertViaUrl,
    ImageResize,
    ImageStyle,
    ImageTextAlternative,
    ImageToolbar,
    ImageUpload,
    Indent,
    IndentBlock,
    Italic,
    Link,
    List,
    ListProperties,
    Markdown,
    MediaEmbed,
    Mention,
    Paragraph,
    PasteFromOffice,
    RemoveFormat,
    SelectAll,
    ShowBlocks,
    SimpleUploadAdapter,
    SourceEditing,
    SpecialCharacters,
    SpecialCharactersArrows,
    SpecialCharactersCurrency,
    SpecialCharactersEssentials,
    SpecialCharactersLatin,
    SpecialCharactersMathematical,
    SpecialCharactersText,
    Strikethrough,
    Subscript,
    Superscript,
    Table,
    TableCaption,
    TableCellProperties,
    TableColumnResize,
    TableProperties,
    TableToolbar,
    TextPartLanguage,
    TextTransformation,
    Title,
    TodoList,
    Underline,
    Undo
} from 'ckeditor5';

const editorConfig = {
    toolbar: {
        items: [
            'undo',
            'redo',
            '|',
            'sourceEditing',
            'showBlocks',
            '|',
            'heading',
            '|',
            'fontSize',
            'fontFamily',
            'fontColor',
            'fontBackgroundColor',
            '|',
            'bold',
            'italic',
            'underline',
            '|',
            'link',
            'insertImage',
            'insertTable',
            'highlight',
            'blockQuote',
            'codeBlock',
            '|',
            'alignment',
            '|',
            'bulletedList',
            'numberedList',
            'todoList',
            'indent',
            'outdent'
        ],
        shouldNotGroupWhenFull: false
    },
    plugins: [
        AccessibilityHelp,
        Alignment,
        Autoformat,
        AutoImage,
        AutoLink,
        Autosave,
        BalloonToolbar,
        BlockQuote,
        Bold,
        CloudServices,
        Code,
        CodeBlock,
        Essentials,
        FindAndReplace,
        FontBackgroundColor,
        FontColor,
        FontFamily,
        FontSize,
        FullPage,
        GeneralHtmlSupport,
        Heading,
        Highlight,
        HorizontalLine,
        HtmlComment,
        HtmlEmbed,
        ImageBlock,
        ImageCaption,
        ImageInline,
        ImageInsert,
        ImageInsertViaUrl,
        ImageResize,
        ImageStyle,
        ImageTextAlternative,
        ImageToolbar,
        ImageUpload,
        Indent,
        IndentBlock,
        Italic,
        Link,
        List,
        ListProperties,
        Markdown,
        MediaEmbed,
        Mention,
        Paragraph,
        PasteFromOffice,
        RemoveFormat,
        SelectAll,
        ShowBlocks,
        SimpleUploadAdapter,
        SourceEditing,
        SpecialCharacters,
        SpecialCharactersArrows,
        SpecialCharactersCurrency,
        SpecialCharactersEssentials,
        SpecialCharactersLatin,
        SpecialCharactersMathematical,
        SpecialCharactersText,
        Strikethrough,
        Subscript,
        Superscript,
        Table,
        TableCaption,
        TableCellProperties,
        TableColumnResize,
        TableProperties,
        TableToolbar,
        TextPartLanguage,
        TextTransformation,
        Title,
        TodoList,
        Underline,
        Undo
    ],
    balloonToolbar: ['bold', 'italic', '|', 'link', 'insertImage', '|', 'bulletedList', 'numberedList'],
    fontFamily: {
        supportAllValues: true
    },
    fontSize: {
        options: [10, 12, 14, 'default', 18, 20, 22],
        supportAllValues: true
    },
    heading: {
        options: [
            {
                model: 'paragraph',
                title: 'Paragraph',
                class: 'ck-heading_paragraph'
            },
            {
                model: 'heading1',
                view: 'h1',
                title: 'Heading 1',
                class: 'ck-heading_heading1'
            },
            {
                model: 'heading2',
                view: 'h2',
                title: 'Heading 2',
                class: 'ck-heading_heading2'
            },
            {
                model: 'heading3',
                view: 'h3',
                title: 'Heading 3',
                class: 'ck-heading_heading3'
            },
            {
                model: 'heading4',
                view: 'h4',
                title: 'Heading 4',
                class: 'ck-heading_heading4'
            },
            {
                model: 'heading5',
                view: 'h5',
                title: 'Heading 5',
                class: 'ck-heading_heading5'
            },
            {
                model: 'heading6',
                view: 'h6',
                title: 'Heading 6',
                class: 'ck-heading_heading6'
            }
        ]
    },
    htmlSupport: {
        allow: [
            {
                name: /^.*$/,
                styles: true,
                attributes: true,
                classes: true
            }
        ]
    },
    image: {
        toolbar: [
            'toggleImageCaption',
            'imageTextAlternative',
            '|',
            'imageStyle:inline',
            'imageStyle:wrapText',
            'imageStyle:breakText',
            '|',
            'resizeImage'
        ]
    },
    initialData:
        init_data,
    link: {
        addTargetToExternalLinks: true,
        defaultProtocol: 'https://',
        decorators: {
            toggleDownloadable: {
                mode: 'manual',
                label: 'Downloadable',
                attributes: {
                    download: 'file'
                }
            }
        }
    },
    list: {
        properties: {
            styles: true,
            startIndex: true,
            reversed: true
        }
    },
    mention: {
        feeds: [
            {
                marker: '@',
                feed: [
                    /* See: https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html */
                ]
            }
        ]
    },
    menuBar: {
        isVisible: true
    },
    placeholder: 'Type or paste your content here!',
    table: {
        contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells', 'tableProperties', 'tableCellProperties']
    }
};

// const editors = {}; // You can also use new Map() if you use ES6.
//
// function createEditor(  ) {
//     return ClassicEditor
//         .create( document.getElementById("editor"), editorConfig )
//         .then( editor => {
//             editors[ "editor" ] = editor;
//         } )
//         .catch( err => console.error( err.stack ) );
// }
//
// function deleteAllEditors() {
//     Object.keys(editors).forEach(key => {
//         if (editors[key]) {
//             editors[key].destroy().then(() => {
//                 delete editors[key];
//                 console.log(`Editor destroyed for ${key}`);
//             });
//         }
//     });
// }
//
// deleteAllEditors();
// createEditor();

// createEditor();


// ClassicEditor.create(document.querySelector('#editor'), editorConfig)
