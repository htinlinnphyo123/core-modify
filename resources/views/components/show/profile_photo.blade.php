@props(['width' => '', 'height' => '', 'src' => '', 'rounded' => null ])
<div class="gap-4">
    <x-form.label title="user.profile_photo" />
    <img class="{{ $width }} {{ $height }} {{ $rounded }} cursor-pointer" src="{{ $src }}"
        alt="" id="profile-photo" onclick="viewImage()">
    <div class="div" id="popup">
        <img src="" alt="" id="selected-image" />
    </div>
</div>
<script>
    const viewImage = () => {
        const popup = document.querySelector("#popup");
        const gallery = document.querySelector("#profile-photo");
        const selectedImage = document.querySelector("#selected-image");
        selectedImage.src = gallery.src;
        popup.style.transform = `translateY(0%)`;
        popup.addEventListener("click", () => {
            popup.style.transform = `translateY(-100%)`;
            popup.src = "";
        });
    }
</script>
