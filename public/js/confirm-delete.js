const deleteButtons = document.querySelectorAll('.delete-button');
deleteButtons.forEach(btn => {
    btn.addEventListener('submit', function (e) {
        const conf = confirm('Are you sure you want to delete this post?');
        if (conf) this.sumbit();
        else e.preventDefault();
    });
});