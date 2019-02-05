import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import axios from "axios";

class ImageUploader {
    constructor(loader, url) {
        this.loader = loader;
        this.url = url;
    }

    upload() {
        const token = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        axios.defaults.headers.common = {
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token
        };

        const data = new FormData();
        data.append("image", this.loader.file);

        return new Promise((resolve, reject) =>
            axios
                .post("/api/image-upload", data, {
                    headers: { "content-type": "multipart/form-data" }
                })
                .then(res => res.data)
                .then(resolve)
                .catch(reject)
        );
    }

    abort() {}
}

const ImageUploaderAdapter = editor =>
    (editor.plugins.get("FileRepository").createUploadAdapter = loader =>
        new ImageUploader(loader, "/api/image-upload"));

window.$(document).ready(function() {
    ClassicEditor.create(document.querySelector("[data-replace-editor]"), {
        extraPlugins: [ImageUploaderAdapter],
        mediaEmbed: {
            previewsInData: true,
            providers: [
                {
                    name: "facebook",
                    url: /^(https?:)?(\/\/)?(www.)?facebook\.com\/([a-zA-Z.-]+)\/(posts|videos)\/(\d+)/g,
                    html: match => {
                        const html = `<iframe class="article-media--facebook" src="https://www.facebook.com/plugins/post.php?href=${
                            match[0]
                        }&width=500" width="500" height="727" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>`;
                        return html;
                    }
                }
            ]
        }
    }).catch(console.error);
});
