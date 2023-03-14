function editBook(bookIsbn){
    window.location = "index.php?menu=book_update&isbn=" + bookIsbn;
}

function deleteBook(bookIsbn){
    const confirmation = window.confirm("Are you sure want to delete this data ?")
    if(confirmation){
        window.location = 'index.php?menu=book&com=del&isbn=' + bookIsbn;
    }
}