document.querySelector('#posts-search-input').oninput = function () {
    var [categoryUrls, categoryItems] = getCategoryItems();
    if (categoryItems && categoryItems.length)
        updateCategoryItemsQueryString(categoryUrls, categoryItems, this.value);
}

var getCategoryItems = function () {

    var categoryUrls = [];
    const categoryItems = document.querySelectorAll(".posts-categories-dropdown");
    if (categoryItems && categoryItems.length)
        categoryItems.forEach( item => categoryUrls.push(item.href));
    
    return [categoryUrls, categoryItems];
}

var updateCategoryItemsQueryString = function (categoryUrls, categoryItems, search) {
    categoryItems.forEach( (item, key) => {
        const url = categoryUrls[key];
        const queryString = parseQueryString(url.substring( url.indexOf('?') + 1 ))

        queryString.search = search.trim();
        if (!search) delete queryString.search;
        item.href = buildQueryString(queryString, url.substring(0, url.indexOf('?') -1));    
    })
}

var buildQueryString = function (queryString, url) {
    return url +'?'+ encodeQueryData(queryString);
}

var encodeQueryData = function (queryString) {
    const ret = [];

    for (let item in queryString)
        ret.push(encodeURIComponent(item) + '=' + encodeURIComponent(queryString[item]));
    
    return ret.join('&');
 }

var parseQueryString = function ( queryString ) {
    var params = {}, queries, temp, i, l;

    // Split into key/value pairs
    queries = queryString.split("&");

    // Convert the array of strings into an object
    for ( i = 0, l = queries.length; i < l; i++ ) {
        temp = queries[i].split('=');
        params[temp[0]] = temp[1];
    }

    return params;
};