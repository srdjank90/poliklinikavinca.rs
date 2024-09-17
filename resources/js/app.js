import "./bootstrap";
import * as bootstrap from "bootstrap";
window.bootstrap = bootstrap;

// Enable Tooltip
const tooltipTriggerList = document.querySelectorAll(
    '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
    (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
);

// TinyMCE
tinymce.init({
    selector: ".tinymce",
    plugins:
        "preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons accordion",
    editimage_cors_hosts: ["picsum.photos"],
    menubar: "file edit view insert format tools table help",
    toolbar:
        "undo redo | accordion accordionremove | blocks fontfamily fontsize | bold italic underline strikethrough | align numlist bullist | link image | table media | lineheight outdent indent| forecolor backcolor removeformat | charmap emoticons | code fullscreen preview | save print | pagebreak anchor codesample | ltr rtl",
    autosave_ask_before_unload: true,
    autosave_interval: "30s",
    autosave_prefix: "{path}{query}-{id}-",
    autosave_restore_when_empty: false,
    autosave_retention: "2m",
    image_advtab: true,
    link_list: [
        { title: "My page 1", value: "https://www.tiny.cloud" },
        { title: "My page 2", value: "http://www.moxiecode.com" },
    ],
    image_list: [
        { title: "My page 1", value: "https://www.tiny.cloud" },
        { title: "My page 2", value: "http://www.moxiecode.com" },
    ],
    image_class_list: [
        { title: "None", value: "" },
        { title: "Some class", value: "class-name" },
    ],
    importcss_append: true,
    file_picker_callback: (callback, value, meta) => {
        /* Provide file and text for the link dialog */
        if (meta.filetype === "file") {
            callback("https://www.google.com/logos/google.jpg", {
                text: "My text",
            });
        }

        /* Provide image and alt text for the image dialog */
        if (meta.filetype === "image") {
            callback("https://www.google.com/logos/google.jpg", {
                alt: "My alt text",
            });
        }

        /* Provide alternative source and posted for the media dialog */
        if (meta.filetype === "media") {
            callback("movie.mp4", {
                source2: "alt.ogg",
                poster: "https://www.google.com/logos/google.jpg",
            });
        }
    },
    height: 600,
    image_caption: true,
    quickbars_selection_toolbar:
        "bold italic | quicklink h2 h3 blockquote quickimage quicktable",
    noneditable_class: "mceNonEditable",
    toolbar_mode: "sliding",
    contextmenu: "link image table",
    skin: false ? "oxide-dark" : "oxide",
    content_css: false ? "dark" : "default",
    content_style:
        "body { font-family:Helvetica,Arial,sans-serif; font-size:16px }",
});

// Delete Item by clicking on delete button in table
$(".item-delete").click(function () {
    var id = $(this).data("id");
    var model = $(this).data("model");
    var token = $("meta[name='csrf-token']").attr("content");

    Swal.fire({
        title: "Are you sure you want to delete?",
        text: "This action cannot be revoked and the data will be deleted forever",
        showCancelButton: true,
        confirmButtonText: "Delete",
        icon: "question",
        confirmButtonColor: "#0d6efd",
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: "/backend/" + model + "/delete/" + id,
                type: "DELETE",
                data: {
                    id: id,
                    _token: token,
                },
                success: function (response) {
                    $("#tr-" + id).remove();
                    Swal.fire(
                        "Deleted!",
                        "You have successfully deleted the item!",
                        "success"
                    );
                    window.location.reload();
                },
            });
        }
    });
});

// Generate Slug when entering Name or Title
$(".generate-slug").on("input", function () {
    console.log("Here");
    let slug = $(this).val();
    $(".slug-generated").val(_.kebabCase(slug));
});
