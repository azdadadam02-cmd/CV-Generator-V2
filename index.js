function changeDesign(imageSrc, templateName, clickedBtn) {
    
    document.getElementById('main-preview').src = imageSrc;
    document.getElementById('selected_template').value = templateName;
    let buttons = document.querySelectorAll('.design-btn');
    buttons.forEach(btn => btn.classList.remove('active'));
    clickedBtn.classList.add('active');
}
function openStory() {
        document.getElementById("storyModal").style.display = "block";
    }
    function closeStory() {
        document.getElementById("storyModal").style.display = "none";
    }
    window.onclick = function(event) {
        var modal = document.getElementById("storyModal");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
