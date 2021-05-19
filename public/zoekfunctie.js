window.filtercategorie = function () {
    let categorie_ids = document.getElementsByClassName('cbCategorie')
    let selectedCategorie_ids = []
    for (var i = 0; i < categorie_ids.length; i++) {
        if (categorie_ids[i].checked == true) {
            selectedCategorie_ids.push(categorie_ids[i].id)
        }
    }

    console.log(selectedCategorie_ids);
    axios.post('/overview/getblogpostbycategories', {
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        categorie_ids: selectedCategorie_ids
    }).then(response => {
        $('#BlogBody').html(response.data)
    })
    console.log(selectedCategorie_ids);
}
