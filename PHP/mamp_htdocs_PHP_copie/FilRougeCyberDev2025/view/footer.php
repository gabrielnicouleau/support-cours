<?php
class ViewFooter{
    
    public function render():string{
        return "</main>

    <footer>
      <nav>
        <a href='#'>contact</a>
        <a href='#'>à propos</a>
        <a href='#'>copyrights</a>
        <a href='#'>liens utiles</a>
      </nav>
    </footer>
    
    <div id='app'>
      <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>
      <script type='module' src='main.js'></script>
    </div>
  </body>

</html>";
    }
}
?>