function getRefinedProductArray() {
  if (true) {
    return getProductArray();
  } else {
    let allProducts = getProductArray();
    let refinedProductArray;
    allProducts.forEach((currentProduct) => {});
    return refinedProductArray;
  }
}

function setUpStorePage() {
  let ProductArray = getRefinedProductArray();
  let counter = 0;
  ProductArray.forEach((currentProduct) => {
    if (currentProduct[0] != "" && currentProduct[0] != null) {
      let currentProductTitle = document.createElement("p");
      currentProductTitle.classList.add("secondary-product-title");
      currentProductTitle.textContent =
        currentProduct[0] + "- " + currentProduct[1];

      let currentProductPrice = document.createElement("p");
      currentProductPrice.classList.add("secondary-product-price");
      currentProductPrice.textContent = currentProduct[3];

      let currentProductImage = document.createElement("img");
      currentProductImage.classList.add("secondary-product-img");
      currentProductImage.src = currentProduct[4];

      let currentProductElem = document.createElement("div");
      currentProductElem.classList.add("product");

      currentProductElem.appendChild(currentProductImage);
      currentProductElem.appendChild(currentProductTitle);
      currentProductElem.appendChild(currentProductPrice);
      currentProductElem.id = currentProductTitle.textContent;
      currentProductElem.onclick = openItemPage;
      document.getElementById("all-products").appendChild(currentProductElem);
    }
    counter++;
  });
}

//saves the item clicked to the session storage then loads the item.php page
function openItemPage() {
  //store the ID in session storage
  sessionStorage.setItem("product", this.id);
  //open up new page
  window.location.href = "item.php";
}

//Load item into item.php
function loadItemPage() {
  let product = searchForProduct(sessionStorage.getItem("product"));
  //display image
  let productImage = document.getElementById("primary-product-image");
  productImage.src = product[4];
  //display information
  let titleElm = document.getElementById("selected-product-title-container");
  let productTitle = document.createElement("h2");
  productTitle.classList.add("primary-product-title");
  productTitle.textContent = product[0] + "- " + product[1];
  titleElm.appendChild(productTitle);

  let priceElm = document.getElementById("selected-product-price-container");
  let productPrice = document.createElement("h2");
  productPrice.classList.add("primary-product-price");
  productPrice.textContent = product[3];
  priceElm.appendChild(productPrice);

  let descriptionElm = document.getElementById(
    "selected-product-description-container"
  );
  let productDescription = document.createElement("p");
  productDescription.id = "product-description";
  productDescription.textContent = product[2];
  descriptionElm.appendChild(productDescription);
}

//Search for item
function searchForProduct(searchKey) {
  let productArray = getProductArray();
  let productKey;
  let found;
  productArray.forEach((currentProduct) => {
    productKey = currentProduct[0] + "- " + currentProduct[1];
    if (productKey == searchKey) {
      found = currentProduct;
    }
  });
  return found;
}

function addBasketProduct() {
  let itemToAdd = sessionStorage.getItem("product");
  let basket = getBasketString();
  if (basket != null) {
    if (basketContains(itemToAdd)) {
      //add item within basket
      basket = convertBasketArrayToString(addMultiProduct(itemToAdd));
    } //add item to end of basket
    else {
      basket = basket + ",1*" + itemToAdd;
    }
  } else {
    //Start new basket
    basket = "1*" + itemToAdd;
  }

  localStorage.setItem("basket", basket);
}

function addMultiProduct(product) {
  let productArray = getBasketProductArray();
  for (let i = 0; i < productArray.length; i++) {
    let currentProduct = productArray[i];
    let currentProductAmount = currentProduct[0];
    let currentProductName = currentProduct[1];
    if (currentProductName == product) {
      currentProductAmount = parseInt(currentProductAmount) + 1;
      currentProduct[0] = currentProductAmount;
    }
  }
  return productArray;
}

//creates elements for the basket page
function updateBasketPage() {
  if (getBasketString() != null) {
    let basketArray = getBasketProductArray();
    basketArray.forEach((product) => {
      let productString = product[1];
      let productInfo = searchForProduct(productString);
      let productAmount = product[0];
      let productName = productInfo[0];
      let productColour = productInfo[1];
      let productPrice = productInfo[3];
      let productPriceDec = productPrice.substring(1, productPrice.length);
      console.log(productPriceDec);
      let productImage = productInfo[4];

      let basketItemElem = document.createElement("div");
      basketItemElem.className = "basket-item-container";
      basketItemElem.id = productString + "-container";

      let productImageElem = document.createElement("img");
      productImageElem.className = "basket-product-Image";
      productImageElem.src = productImage;

      let productTitleElem = document.createElement("p");
      productTitleElem.textContent = productName + "- " + productColour;
      productTitleElem.className = "product-info";

      let productPriceElem = document.createElement("p");
      productPriceElem.textContent = productPrice;
      productPriceElem.className = "product-info";

      let productAmountElem = document.createElement("p");
      productAmountElem.textContent = "QTY " + productAmount;
      productAmountElem.className = "product-amount product-info";

      let totalProductPriceElem = document.createElement("p");
      totalProductPriceElem.textContent =
        "£" + (productAmount * productPriceDec).toFixed(2);
      totalProductPriceElem.className = "product-total-price product-info";

      let clearBasketProductBtnElem = document.createElement("button");
      clearBasketProductBtnElem.onclick = clearBasketProduct;
      clearBasketProductBtnElem.innerHTML =
        '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLVZYlxovDUWieRuFvPUFBGYuyBxxhEbCoLw&usqp=CAU">';
      clearBasketProductBtnElem.className = "clear-basket-product-btn";
      clearBasketProductBtnElem.id = productString;

      basketItemElem.appendChild(productImageElem);
      basketItemElem.appendChild(productTitleElem);
      basketItemElem.appendChild(productPriceElem);
      basketItemElem.appendChild(productAmountElem);
      basketItemElem.appendChild(totalProductPriceElem);
      basketItemElem.appendChild(clearBasketProductBtnElem);
      document
        .getElementById("basket-secondary-container")
        .appendChild(basketItemElem);
    });
  } else {
    let emptyBasketElem = document.createElement("h2");
    emptyBasketElem.textContent = "Basket Empty";
    emptyBasketElem.id = "empty-basket-error";

    document
      .getElementById("basket-secondary-container")
      .appendChild(emptyBasketElem);
  }
}
//removes product from basket
function removeBasketProduct(product) {}

//clears a whole product from the basket
function clearBasketProduct() {
  let currentBasketArray = getBasketProductArray();
  let newBasketArray = [];
  let productToRemove = this.id;

  let elemToRemove = document.getElementById(this.id + "-container");
  elemToRemove.remove();

  currentBasketArray.forEach((product) => {
    if (product[1] != productToRemove) {
      newBasketArray.push(product);
    }
  });
  //Set local storage for updated basket
  if (newBasketArray != null && newBasketArray.length != 0) {
    localStorage.setItem("basket", convertBasketArrayToString(newBasketArray));
  } else {
    let emptyBasketElem = document.createElement("h2");
    emptyBasketElem.textContent = "Basket Empty";
    emptyBasketElem.id = "empty-basket-error";
    document
      .getElementById("basket-secondary-container")
      .appendChild(emptyBasketElem);
    localStorage.removeItem("basket");
  }
}
//returns true/false based if a product is already contained in the basket
function basketContains(product) {
  let basket = getBasketString();
  if (basket.includes(product) == true) {
    return true;
  } else {
    return false;
  }
}

function convertBasketArrayToString(basketArray) {
  let currentProduct = basketArray[0];
  let basketString = currentProduct[0] + "*" + currentProduct[1];
  for (let i = 1; i <= basketArray.length - 1; i++) {
    currentProduct = basketArray[i];
    basketString =
      basketString + "," + currentProduct[0] + "*" + currentProduct[1];
  }
  return basketString;
}

function getBasketProductArray() {
  let basketStringArray = getBasketString().split(","); //Array that  each index contains the product name + amount
  let basketArray = [];
  for (let i = 0; i <= basketStringArray.length - 1; i++) {
    basketArray[i] = basketStringArray[i].split("*");
  }
  return basketArray;
}

function getBasketString() {
  if (localStorage.getItem("basket") != null) {
    return localStorage.getItem("basket");
  } else {
    return null;
  }
}

function togglePhoneMenu() {
  let phoneMenuElem = document.getElementById("phone-nav");
  let phoneMenuDisplay = window.getComputedStyle(phoneMenuElem).display;
  console.log(phoneMenuDisplay);
  if (phoneMenuDisplay == "none") {
    console.log("not displayed");
    phoneMenuElem.style.display = "flex";
  } else {
    console.log("displayed");
    phoneMenuElem.style.display = "none";
  }
}

window.addEventListener("resize", function () {
  if (window.matchMedia("(min-width: 600px)").matches) {
    document.getElementById("phone-nav").style.display = "none";
  }
});
