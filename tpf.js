function dupliquer(){
    var lst, txt;
    lst = document.getElementById('com');
    txt = lst.options[lst.selectedIndex].text;
    document.getElementById('Commune').value = txt;
}