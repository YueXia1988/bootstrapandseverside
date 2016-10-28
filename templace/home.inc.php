<?php
$title = " Home";
include "templace/master.mc.php";
function content(){
  global $moviesuggest;
?>

              <div class="row">
                <div class="col-xs-12">
                  <h1>Schlockoberfest<small>The Best Worst Festival Ever !</small></h1>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                    <button type="button" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-film" aria-hidden="true"></span> Film Programme</button>

                    <!-- Indicates a successful or positive action -->
                    <button type="button" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Buy Tickets ( Coming Soon ! )</button>

              
                </div>
                <div class="col-sm-6">
                    <img src="https://placekitten.com/700/400" alt="Kitten Image" class="img-responsive" alt="Responsive image">
                </div>
              </div> 
              <div class="row">
                <div class="col-sm-4">
                  <h3 class="text-center"> Best Worst Movie (2009) </h3>
                  <p>This documentry reiews the making of film "Troll 2" from the perspective of its child artist, M</p>
                </div>
                <div class="col-sm-4">
                  <h3 class="text-center"> Movie Suggest </h3>


                                   <form class="form-horizontal" method="post" action=".\?page=moviesuggest">
                          <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">

                              <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $moviesuggest['email'];?>"> 
                              <?php if(! empty($moviesuggest['errors']['email'])): ?>
                              <span class="text-danger"><?php echo $moviesuggest['errors']['email']?></span>
                              <?php endif;?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Movie Title</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="title" placeholder="Troll 2" name="title">
                              <span class="text-danger"><?php echo $moviesuggest['errors']['title']?></span>

                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <div class="checkbox" >
                                <label>
                                  <input type="checkbox" name="checkbox"> Subscribe for Schlockoberfest Newsletter Once a Month !
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-primary">Suggest movie</button>
                            </div>
                          </div>
                        </form>
                        </div>
                <div class="col-sm-4">
                  <h3 class="text-center"> Our Sponsors </h3>
                  <p cla>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
              </div>
  <?php            
   }     

       