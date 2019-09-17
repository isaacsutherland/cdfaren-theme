export default {
  init() {
    // JavaScript to be fired on all pages
    console.log('common');
    var tt = document.querySelectorAll('.tab');
    var pp = document.querySelectorAll('div.page');
    for (var i=0; i<tt.length; i++) {
        tt[i].addEventListener('click', function(i,t) {
            return function(e) {
                for (var j=0; j<tt.length; j++) {
                    tt[j].className = i==j ? 'tab sel' : 'tab';
                    pp[j].className = i==j ? 'page sel' : 'page';
                }
            }
        }(i, tt[i]));
    }
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
