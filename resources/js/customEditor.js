import EditorJS from '@editorjs/editorjs';
import Header from "@editorjs/header";
import ImageTool from "@editorjs/image";
import RawTool from '@editorjs/raw';
import Checklist from '@editorjs/checklist';
import Table from '@editorjs/table'
import Underline from '@editorjs/underline';
import AttachesTool from '@editorjs/attaches';
import Delimiter from '@editorjs/delimiter';
import NestedList from '@editorjs/nested-list';
import Quote from '@editorjs/quote';
import CodeTool from '@editorjs/code';
import InlineCode from "@editorjs/inline-code";

if(document.getElementById('blog-description')) {
    const editor = new EditorJS({
        holder: 'blog-description',
        placeholder : "Add your block here",
        tools: {
            header: {
                class: Header,
                inlineToolbar: ['link']
            },
            code: CodeTool,
            list: {
                class: NestedList,
                inlineToolbar: true,
                config: {
                    defaultStyle: 'unordered'
                },
            },
            inlineCode: {
                class: InlineCode,
                shortcut: 'CMD+SHIFT+M',
            },
            image: {
                class: ImageTool,
                config: {
                    endpoints: {
                        byFile: 'http://localhost:8000/api/uploadImage', // Your backend file uploader endpoint
                        byUrl: 'http://localhost:8000/api/fetchUrl', // Your endpoint that provides uploading by Url
                    }
                }
            },
            delimiter: Delimiter,
            underline: Underline,
            attaches: {
                class: AttachesTool,
                config: {
                    endpoint: 'http://localhost:8008/uploadFile'
                }
            },
            table: Table,
            raw: RawTool,
            checklist :{
                class: Checklist,
                inlineToolbar: true,
            },
            quote: {
                class: Quote,
                inlineToolbar: true,
                shortcut: 'CMD+SHIFT+O',
                config: {
                    quotePlaceholder: 'Enter a quote',
                    captionPlaceholder: 'Quote\'s author',
                },
            }
        },
        onReady: () => {
            console.log('Editor.js is ready to work!')
        },
        onChange: (api, event) => {
            console.log('Now I know that Editor\'s content changed!', event)
            editor.save().then((outputData) => {
                console.log('Article data: ', outputData)
            });
        },
    });
}
