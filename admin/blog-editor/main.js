
const editor = new EditorJS({
    holder: 'editorjs',
    placeholder: "What's in your mind",
    tools: {
        raw: RawTool,
        header: {
            class: Header,
            config: {
                placeholder: 'Enter a header',
                levels: [1, 2, 3, 4, 5, 6],
                defaultLevel: 3
            }
        },
        quote: {
            class: Quote,
            inlineToolbar: true,
            shortcut: 'CMD+SHIFT+O',
            config: {
                quotePlaceholder: 'Enter a quote',
                captionPlaceholder: 'Quote\'s author',
            },
        },
        embed: {
            class: Embed,
            config: {
                services: {
                    youtube: true,
                    facebook: true,
                    instagram: true
                }
            }
        },
        code: CodeTool,
        linkTool: {
            class: LinkTool,
            config: {
                endpoint: 'http://localhost/projects/nutrio/admin/blog-editor/link.php', // Your backend endpoint for url data fetching,
            },
        },
        image: {
            class: ImageTool,
            config: {
                endpoints: {
                    byFile: 'http://localhost/projects/nutrio/admin/blog-editor/uploadFile.php', // Your backend file uploader endpoint
                    byUrl: 'http://localhost/projects/nutrio/admin/blog-editor/fetchUrl.php', // Your endpoint that provides uploading by Url
                }
            }
        },

        checklist: {
            class: Checklist,
            inlineToolbar: true,
        },

        list: {
            class: List,
            inlineToolbar: true,
            config: {
                defaultStyle: 'unordered'
            }
        },

    }
});

// saving data xazx
$("#blog_post_form").on("submit", function (e) {
    e.preventDefault();

    var form_data = new FormData(this);
    console.log(form_data.get('feature_img').name);
    if (form_data.get("post_title") == "" || form_data.get("feature_img").name == "") {
        alert("All fields are required");
    } else {
        editor.save().then((outputData) => {
            console.log(outputData);
            const resultHTML = convertToHTML(outputData.blocks);
            if (resultHTML == "") {
                alert("Blog Content is required")
            } else {
                form_data.append("post_content", resultHTML);
                $.ajax({
                    url: "ajax_calls/blogs/addBlog.php",
                    type: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function (response) {
                        if (response.success) {
                            alert(response.msg);
                        } else {
                            alert(response.msg);
                            if ('login_redirect' in response && response.login_redirect) {
                                window.location.href = "index.php";
                            }
                        }
                    },
                    error: function () {
                        alert("An unexpected error has occured");
                    }
                });
            }
        }).catch((error) => {
            alert('Saving failed: error ' + error)
        });
    }


});

// generate slug
$("#post_title").on("input",function(){
    $.ajax({
        url: "ajax_calls/blogs/generateSlug.php",
        type: "POST",
        data: {
            post_title:$(this).val()
        },
        dataType: "json",
        success: function (response) {
            if(response.success){
                $("#post_slug").val(response.slug);
            }
        }
    });
});

function convertToHTML(jsonData) {
    let html = '';
    jsonData.forEach(item => {
        switch (item.type) {
            case 'header':
                html += `<h${item.data.level}>${item.data.text}</h${item.data.level}>`;
                break;
            case 'paragraph':
                html += `<p>${item.data.text}</p>`;
                break;
            case 'quote':
                html += `<blockquote>${item.data.text}<br><cite>- ${item.data.caption}</cite></blockquote>`;
                break;
            case 'code':
                if (item.data.languageCode == "js") {
                    var language = "javascript";
                }else if (item.data.languageCode == "css") {
                    var language = "css";
                }else if (item.data.languageCode == "html") {
                    var language = "markup";
                }
                var code = item.data.code.replace(/[\u00A0-\u9999<>\&]/g, function(i) {
                    return '&#'+i.charCodeAt(0)+';';
                 });
                var language_class = "language-" + language;
                html += `<pre><code class="${language_class}">${code}</code></pre>`;
                break;
            case 'linkTool':
                html += `<a href="${item.data.link}" target="_blank">${item.data.meta.title}</a>`;
                break;
            case 'image':
                html += `<div class="blog_imag"><img src="${item.data.file.url}" alt="${item.data.caption}" /></div>`;
                break;
            case 'list':

                if (item.data.style = "ordered") {
                    html += `<ol>`;
                } else {
                    html += `<ul>`;
                }
                item.data.items.forEach(li => {
                    html += `<li>${li}</li>`;
                });
                if (item.data.style = "ordered") {
                    html += `</ol>`;
                } else {
                    html += `</ul>`;
                }

                break;
            default:
                break;
        }
    });
    return html;
}



