<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Galatasaray</title>
    <style>
        label {
            display: inline-block;
            width: 100px;
            vertical-align: top;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
        <h2 class="my-4">Post a new Article</h2>
        <form id="myForm">
            <label for="title">Title:</label><input type="text" id="title" />
            <br>
            <label for="description">Description:</label><textarea id="description" cols="40"></textarea>
            <br>
            <label for="price">Price:</label><textarea id="price" cols="40"></textarea>
            <br>
            <label for="stock">Stock:</label><textarea id="stock" cols="40"></textarea>
            <br>
            <label for="category">Category:</label><textarea id="category" cols="40"></textarea>
            <br>
            <button type="button" onclick="sendForm();">Send!</button>
        </form>

        <h2 class="my-4">Articles</h2>
        <div id="articles">
            <p>Articles go here...</p>
        </div>
    </div>

    <script>

async function loadData() {

    // use fetch to retrieve the articles from http://localhost/api/article

    const response = await fetch("http://localhost/api/article");
    const articles = await response.json();
    console.log(articles);

    // Create an H2 with the title and a p with the content for every article
    // And display the articles on the page by appending them to the 'articles' div
    const div = document.getElementById('articles');
    div.innerHTML = '';

    articles.forEach(article => {
        const h2 = document.createElement('h3');
        h2.innerText = article.title;
        const description = document.createElement('p');
        description.innerText = article.description;
        const price = document.createElement('p');
        price.innerText = article.price;
        const stock = document.createElement('p');
        stock.innerText = article.stock;
        const category = document.createElement('p');
        category.innerText = article.category;

        div.appendChild(h2);
        div.appendChild(description);
        div.appendChild(price);
        div.appendChild(stock);
        div.appendChild(category);

    });

}

async function sendForm() {

    

    // Create an object with the data from the form (title and content)
    let data = {
        title: document.getElementById('title').value,
        description: document.getElementById('description').value,
        price: document.getElementById('price').value,
        stock: document.getElementById('stock').value,
        category: document.getElementById('category').value
    };

    console.log(data);
  
    // Post the data to http://localhost/api/article using fetch
    const response = await fetch('http://localhost/api/article',
        {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            
            body: JSON.stringify(data)


        });

    if (!response.ok) {
        
        // Note: We shouldn't actually send detailed backend errors to our clients 
        // in a production environment. Log them in the backend instead.

        const error = await response.text();
        console.log(error);

        const form = document.getElementById('myForm');
        const errorDiv = document.createElement('div');
        errorDiv.classList.add('alert', 'alert-danger');

        errorDiv.innerHTML = error;
        form.prepend(errorDiv);
    }

    // (Optional) Reload the articles on the page afterward
    loadData();
}

// Load the articles when the page is opened
loadData();
</script>


</body>
</html>