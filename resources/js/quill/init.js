import startQuillEditor from "./startQuillEditor";

export default function initializeQuillEditor(id="description") {
    const hiddenInput = document.getElementById(id);
    console.log('hey')
    const quill = startQuillEditor(
        `#quill-${id}`,
        "pages/quill",
        hiddenInput.value
    );

    let timeoutId;
    quill.on('text-change', function() {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {
            hiddenInput.value = quill.root.innerHTML;
        }, 1000);
    });
}