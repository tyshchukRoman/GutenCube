/*
 * Fix bug with empty Wishlist name in popup after adding product
 */
function FixWishlistPopup() {

  // Custom Text to insert into Wishlist Popup
  const productRemovedText = 'The product has been removed from your wishlist';
  const productAddedText = 'The product has been added to your wishlist';

  // Create a MutationObserver to watch for popup elements
  const observer = new MutationObserver((mutationsList) => {
      for (let mutation of mutationsList) {
          if (mutation.type === 'childList') {
              mutation.addedNodes.forEach(node => {
                  if (node.classList && node.classList.contains('yith-wcwl-add-to-wishlist__feedback--product_removed')) {
                      node.textContent = productRemovedText;
                  } else if (node.classList && node.classList.contains('yith-wcwl-add-to-wishlist__feedback')) {
                      node.textContent = productAddedText;
                  }
              });
          }
      }
  });

  // Start observing the whole body for dynamic popups
  observer.observe(document.body, { childList: true, subtree: true });

};

export default FixWishlistPopup;
