<!--====== CONTACT PART START ======-->
  <!--====== BLOG PART START ======-->
    
<section id="contact" class="contact_area pt-70 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="requadre-contacte col-lg-6">
                <div class="contact_wrapper mt-45 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.9s">
                    <div class="section_title pb-15">
                        <h1 class="sub_title">Contacta con migo</h1>

                        <h3 class="sub_title">Ven con nosotras a celebrar una vida llena 
                            de alegrías</h3>
                        <p></p>
                    </div> <!-- section title -->
                    <div class="contact_form">
                            <form  method="POST" action="{{ URL::to('/contacta/email') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">@lang('contacte.Nom')</label>
                                <div class="col-sm-10">
                                    <input name="name" class="form-control" type="text" placeholder="@lang('contacte.Nom')" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">@lang('contacte.Email')</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="@lang('contacte.Email')">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">@lang('contacte.Missatge')</label>
                                <div class="col-sm-10">
                                    <input type="text" name="missatge" class="form-control" id="inputEmail3" placeholder="@lang('contacte.Missatge')">
                                </div>
                            </div>
                            <div class="form-group row">

                            <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input type="checkbox" name="checkbox" id="option" required="" data-validation-required-message="Accepta la politica de privacitat." data-changeadded="required" aria-label=" Sí, accepto la politica de privacitat de TecnoLord" aria-labelledby="id-hatemile-association-7294589648893151-0" aria-required="true">
                                        <label for="option" id="id-hatemile-association-7294589648893151-0"><span></span> 
                                            <p class="section-subheading text-muted">Sí, accepto la <a class="portfolio-link" data-toggle="modal" href="#politicaPrivacitat">politica de privacitat</a> de Meritxell Carrillo</p>
                                            <span class="force-read-after" data-attributerequiredof="option"> Camp obligatori</span>
                                        </label>
                                        <p class="help-block text-danger"></p>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Envia</button>
                                </div>
                                <span>TxellCarrillo li informa que les dades de caracter personal que proporcionis omplint el formulari serán tractats per Meritxell Carrillo com a responsable d\'aquesta web. La finalitat de la recollida i tractament de les dades personals que sol·licito són per gestionar la sol·licitut que realizes en aquest formulario de contacte. Legitimació: Consentimient de l\'interessat.</span>
                                
                            </div>
                        </form>
                    </div> <!-- contact form -->
                </div> <!-- contact wrapper -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>


<!--====== CONTACT PART ENDS ======-->