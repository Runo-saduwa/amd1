// variables
const cartBtn = document.querySelector(".cart-btn");
const closeCartBtn = document.querySelector(".close-cart");
const clearCartBtn = document.querySelector(".clear-cart");
const cartDOM = document.querySelector(".cart");
const cartOverlay = document.querySelector(".cart-overlay");
const cartItems = document.querySelector(".cart-items");
const cartTotal = document.querySelector(".cart-total");
const cartContent = document.querySelector(".cart-content");
const productsDOM = document.querySelector(".products-center");
const resProductsDOM = document.querySelector(".resprod-center");
const restaurantDOM = document.querySelector(".restaurants-center");
const selectInput = document.querySelector('.custom-select');

let cart = [];


// products
class Products {
  
  async getRestaurantProducts() {
    
       try {
        let result   = await fetch("food.json");
        let data     = await result.json();
        let products = data.items;
  
        products = products.filter(item => item.id === "1").map(item => {
    
         return item;
        });
        console.log(products[0].food)
        return products[0].food;
       
       } catch(e) {
           console.log(e)
       }
    
  }
   getProductsByFilter(product) {
      return product;
  }


}

// ui
class UI {
    displayProducts(products) {

        let result = "";
        products.forEach(product => {
          result += `
    
          <!-- single item -->
          <div class="col-10 col-sm-6 col-lg-3 max-auto my-1 store-item sweets" data-item="sweets">
              <div class="card single-item">
                  <div class="img-container">
                     <img src=${product.image} class="card-img-top store-img" alt="">
                
                         <button class="store-item-icon bag-btn fas fa-shopping-cart " data-id=${product.id}></button>
                   
                     <span class="item-price">
                        10 - 20 mins
                     </span>
                  </div>
                  <div class="card-body">
                      <div class="card-text text-capitalize">
        <h5 id="store-item-name">${product.title}</h5>
                       <hr>
                       <h5 class="store-item-value"><strong class="font-weight-bold" id="store-item-price">₦${product.price}</strong></h5>
                       <hr>
                      </div>
                  </div>
              </div>
           </div>
           <!-- end of single item -->
       `;
        });
        resproductsDOM.innerHTML = result;
    
      
      }
  displayRestaurantsProducts(product) {

    let result = "";
      result += `
     
        
         ${product.map(food => {
           return `
           <!-- single item -->
           <div class="col-10 col-sm-6 col-lg-3 max-auto my-1 store-item sweets" data-item="sweets">
               <div class="card single-item">
                   <div class="img-container">
                      <img src=${food.image} class="card-img-top store-img" alt="">
                 
                          <button class="store-item-icon bag-btn fas fa-shopping-cart " data-id=${food.id}></button>
                    
                      <span class="item-price">
                         10 - 20 mins
                      </span>
                   </div>
                   <div class="card-body">
                       <div class="card-text text-capitalize">
         <h5 id="store-item-name">${food.title}</h5>
                        <hr>
                        <h5 class="store-item-value"><strong class="font-weight-bold" id="store-item-price">₦${food.price}</strong></h5>
                        <hr>
                       </div>
                   </div>
               </div>
            </div>
           `; 
         }).join('')}
        
   
       


   `;
 
    resProductsDOM.innerHTML = result;

  
  }

  getBagButtons() {
    const buttons = [...document.querySelectorAll(".bag-btn")];
    buttons.forEach(button => {
      let id = button.dataset.id;

      let inCart = cart.find(item => item.id === id);
      console.log(inCart)
      if (inCart) {
        button.innerText = "In Cart";
        button.disabled = true;
      } else {
        button.addEventListener("click", event => {
          // disable button
          event.target.innerText = "In Bag";
          event.target.disabled = true;
          // add to cart
          let cartItem = { ...Storage.getProduct(id), amount: 1 };
          cart = [...cart, cartItem];
          Storage.saveCart(cart);
          // add to DOM
          this.setCartValues(cart);
          this.addCartItem(cartItem);
          this.showCart();
        });
      }
    });
   
  }
  setCartValues(cart) {
    let tempTotal = 0;
    let itemsTotal = 0;
    cart.map(item => {
      tempTotal += item.price * item.amount;
      itemsTotal += item.amount;
    });
    cartTotal.innerText = `₦${parseFloat(tempTotal.toFixed(2))}`;
    cartItems.innerText = itemsTotal;
  }

  addCartItem(item) {
    const div = document.createElement("div");
    div.classList.add("row");
    div.classList.add("cart-item");
    div.innerHTML = `<!-- cart item -->

    <!-- item image -->
    <img src=${item.image} alt="product" />
    <!-- item info -->
    <div>
      <h4>${item.title}</h4>
      <h5>₦${item.price}</h5>
      <span class="remove-item" data-id=${item.id}>remove</span>
    </div>
    <!-- item functionality -->
    <div>
        <i class="fas fa-chevron-up" data-id=${item.id}></i>
      <p class="item-amount">
        ${item.amount}
      </p>
        <i class="fas fa-chevron-down" data-id=${item.id}></i>
    </div>
  <!-- cart item -->

         
    `;
    cartContent.appendChild(div);
  }
  showCart() {
    cartOverlay.classList.add("transparentBcg");
    cartDOM.classList.add("showCart");
  }
  setupAPP() {
    cart = Storage.getCart();
    this.setCartValues(cart);
    this.populateCart(cart);
    cartBtn.addEventListener("click", this.showCart);
    closeCartBtn.addEventListener("click", this.hideCart);
  }
  populateCart(cart) {
    cart.forEach(item => this.addCartItem(item));
  }
  hideCart() {
    cartOverlay.classList.remove("transparentBcg");
    cartDOM.classList.remove("showCart");
  }
  cartLogic() {

    clearCartBtn.addEventListener("click", () => {
      this.clearCart();
    });
    cartContent.addEventListener("click", event => {
      if (event.target.classList.contains("remove-item")) {
        let removeItem = event.target;
        let id = removeItem.dataset.id;
        cart = cart.filter(item => item.id !== id);
        this.setCartValues(cart);
        Storage.saveCart(cart);
        cartContent.removeChild(removeItem.parentElement.parentElement);
        const buttons = [...document.querySelectorAll(".bag-btn")];
        buttons.forEach(button => {
          if (parseInt(button.dataset.id) === id) {
            button.disabled = false;
            button.innerHTML = `<i class="fas fa-shopping-cart"></i>add to bag`;
          }
        });
      } else if (event.target.classList.contains("fa-chevron-up")) {
        let addAmount = event.target;
        let id = addAmount.dataset.id;
        let tempItem = cart.find(item => item.id === id);
        tempItem.amount = tempItem.amount + 1;
        Storage.saveCart(cart);
        this.setCartValues(cart);
        addAmount.nextElementSibling.innerText = tempItem.amount;
      } else if (event.target.classList.contains("fa-chevron-down")) {
        let lowerAmount = event.target;
        let id = lowerAmount.dataset.id;
        let tempItem = cart.find(item => item.id === id);
        tempItem.amount = tempItem.amount - 1;
        if (tempItem.amount > 0) {
          Storage.saveCart(cart);
          this.setCartValues(cart);
          lowerAmount.previousElementSibling.innerText = tempItem.amount;
        } else {
          cart = cart.filter(item => item.id !== id);
          // console.log(cart);

          this.setCartValues(cart);
          Storage.saveCart(cart);
          cartContent.removeChild(lowerAmount.parentElement.parentElement);
          const buttons = [...document.querySelectorAll(".bag-btn")];
          buttons.forEach(button => {
            if (parseInt(button.dataset.id) === id) {
              button.disabled = false;
              button.innerHTML = `<i class="fas fa-shopping-cart"></i>add to bag`;
            }
          });
        }
      }
    });


 
  }
  clearCart() {
    // console.log(this);

    cart = [];
    this.setCartValues(cart);
    Storage.saveCart(cart);
    const buttons = [...document.querySelectorAll(".bag-btn")];
    buttons.forEach(button => {
    //   button.disabled = false;
    button.classList.remove('disabled')
    //   button.innerHTML = `<i class="fas fa-shopping-cart"></i>add to bag`;
    });
    while (cartContent.children.length > 0) {
      cartContent.removeChild(cartContent.children[0]);
    }
    this.hideCart();
  }
}

class Storage {
  static saveProducts(products) {
    localStorage.setItem("products", JSON.stringify(products));
  }
  static getProduct(id) {
    let products = JSON.parse(localStorage.getItem("products"));
    return products.find(product => product.id === id);
  }
  static saveCart(cart) {
    localStorage.setItem("cart", JSON.stringify(cart));
  }
  static getCart() {
    return localStorage.getItem("cart")
      ? JSON.parse(localStorage.getItem("cart"))
      : [];
  }
}


document.addEventListener("DOMContentLoaded", () => {

  const ui = new UI();
  const products = new Products();
  ui.setupAPP();


    products.getRestaurantProducts().then(products =>{
      console.log(products);
      ui.displayRestaurantsProducts(products)
      const newProd = [];

      newProd.push(...products)
      Storage.saveProducts(newProd);
      })
      .then(() => {
        ui.getBagButtons();
        ui.cartLogic();
      });


      
    
});

const filterBtn = document.querySelectorAll('.filter-btn');
      //add eventListener to all the butttons

const selectButton = document.querySelector('.selectButton');

selectButton.addEventListener('click', () => {
    let products = new Products();
    const ui = new UI();
    //get the attribute of the button
    const value = selectInput.value;

    products.getRestaurantProducts().then(products => {
        // let restaurantProducts = ui.getProductsByFilter(products);
        let newProducts = products.filter(product => {
            if(value == 'all'){
                return product
            }
            else if(product.filter == value) {
              return product
            }
           
    })
    // products.getProductsByFilter().then(products => {
    //   let newProducts = products.filter(product => {
    //     if(product.filter == value) {
    //       return product
    //     }
    //   })
  
           if(newProducts.length == 0){
              resProductsDOM.innerHTML = `<h1>nothing</h1>`;
           }else {
        ui.displayRestaurantsProducts(newProducts);
        Storage.saveProducts(newProducts);
           }
     
    })
    .then(() => {
      ui.getBagButtons();
      // ui.cartLogic();
    });
})
      filterBtn.forEach(function(btn) {
        btn.addEventListener('click', function(event) {
          let products = new Products();
          const ui = new UI();
          event.preventDefault();
          //get the attribute of the button
          const value = event.target.dataset.filter;
        //get all the store items
        products.getRestaurantProducts().then(products => {
            // let restaurantProducts = ui.getProductsByFilter(products);
            let newProducts = products.filter(product => {
                if(value == 'all'){
                    return product
                }
                else if(product.filter == value) {
                  return product
                }
               
        })
        // products.getProductsByFilter().then(products => {
        //   let newProducts = products.filter(product => {
        //     if(product.filter == value) {
        //       return product
        //     }
        //   })
      
               if(newProducts.length == 0){
                  resProductsDOM.innerHTML = `<h1>nothing</h1>`;
               }else {
            ui.displayRestaurantsProducts(newProducts);
            Storage.saveProducts(newProducts);
               }
         
        })
        .then(() => {
          ui.getBagButtons();
          // ui.cartLogic();
        });
      })
    })
    




