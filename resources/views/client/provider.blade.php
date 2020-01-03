@extends('client.layouts.master')

@section('content')

    <section class="slider">

        <div class="nav-container">
            <a class="next float-left" onclick="plusSlides(1)">❯</a>
            <a class="prev float-right" onclick="plusSlides(-1)">❮</a>
        </div>

        <div class="mySlides">
            <img src="{{asset('client/images/provider1.jpeg')}}">
        </div>

        <div class="mySlides">
            <img src="{{asset('client/images/provider2.jpeg')}}">
        </div>

        <div class="mySlides">
            <img src="{{asset('client/images/provider3.jpeg')}}">
        </div>

    </section>

    <div class="container mt-3 mb-5">
        <div class="row">
            <div class="col-4 col-md-2 mr-auto">
                <img class="demo cursor" src="{{asset('client/images/provider1.jpeg')}}" style="width:100%; height: 110px;object-fit: fill;" onclick="currentSlide(1)" alt="The Woods">
            </div>
            <div class="col-4 col-md-2">
                <img class="demo cursor" src="{{asset('client/images/provider2.jpeg')}}" style="width:100%; height: 110px;object-fit: fill;" onclick="currentSlide(2)" alt="Cinque Terre">
            </div>
            <div class="col-4 col-md-2 ml-auto">
                <img class="demo cursor" src="{{asset('client/images/provider3.jpeg')}}" style="width:100%; height: 110px;object-fit: fill;" onclick="currentSlide(3)" alt="Mountains and fjords">
            </div>
        </div>
    </div>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="mb-0">خدمات تقنية</h2>
                </div>
                <div class="col-12 mb-5"><hr class="m-0"></div>
            </div>

            <div class="row mt-3 mb-5">

                <div class="col-md-9 mb-5 profile-container text-right">

                    <h3>الوصف</h3>
                    <p>
                        هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت.
                    </p>

                    <hr class="mt-5 mb-5">

                    <a href="#" class="comment-title">التعليقات</a>

                    <div class="comment-container">

                        <h5>تقيمات العملاء (23)</h5>

                        <div class="divider"></div>

                        <div class="text-left mt-3 pl-3 mb-3" style="width: 100%;">
                            <div>
                                <span>4.7 / 5</span>
                                <span class="stars">
                                <i class="fa fa-star filled-star"></i>
                                <i class="fa fa-star filled-star"></i>
                                <i class="fa fa-star filled-star"></i>
                                <i class="fa fa-star filled-star"></i>
                                <i class="fa fa-star-o"></i>
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-8 pt-2 mr-auto">
                                <div class="progress" style="height: 0.6rem;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 76%" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-3 ml-auto">
                                <span class="percent">76%</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-8 pt-2 mr-auto">
                                <div class="progress" style="height: 0.6rem;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 19%" aria-valuenow="19" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-3 ml-auto">
                                <span class="percent">19%</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-8 pt-2 mr-auto">
                                <div class="progress" style="height: 0.6rem;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 5%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-3 ml-auto">
                                <span class="percent">5%</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-8 pt-2 mr-auto">
                                <div class="progress" style="height: 0.6rem;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-3 ml-auto">
                                <span class="percent">0%</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-8 pt-2 mr-auto">
                                <div class="progress" style="height: 0.6rem;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-3 ml-auto">
                                <span class="percent">0%</span>
                            </div>
                        </div>

                        <hr class="mt-4 mb-4">

                        <div class="an-comment mb-3">
                            <span class="stars">
                                <i class="fa fa-star filled-star"></i>
                                <i class="fa fa-star filled-star"></i>
                                <i class="fa fa-star filled-star"></i>
                                <i class="fa fa-star filled-star"></i>
                                <i class="fa fa-star-o"></i>
                            </span>
                            &nbsp;&nbsp;
                            <span>Sep 2019 00:24 25</span>
                            <p>
                                خدمة جداً متميزة ، واسلوب راقي جدا في التعامل ، يسعدني التعامل معك
                            </p>
                        </div>

                        <div class="an-comment mb-3">
                            <span class="stars">
                                <i class="fa fa-star filled-star"></i>
                                <i class="fa fa-star filled-star"></i>
                                <i class="fa fa-star filled-star"></i>
                                <i class="fa fa-star filled-star"></i>
                                <i class="fa fa-star filled-star"></i>
                            </span>
                            &nbsp;&nbsp;
                            <span>Jun 2019 02:17 18</span>
                            <p>
                                سعدت جداً بالتعامل معك ، شخص خبير ومتمكن في مجاله
                            </p>
                        </div>

                        <div class="mt-3 pr-3">
                            <form>
                                <span class="stars">
                                <a href="#" style="font-size: 30px;"><i class="fa fa-star filled-star"></i></a>
                                <a href="#" style="font-size: 30px;"><i class="fa fa-star-o filled-star"></i></a>
                                <a href="#" style="font-size: 30px;"><i class="fa fa-star-o filled-star"></i></a>
                                <a href="#" style="font-size: 30px;"><i class="fa fa-star-o filled-star"></i></a>
                                <a href="#" style="font-size: 30px;"><i class="fa fa-star-o filled-star"></i></a>
                            </span>
                                <textarea class="form-control" rows="8" placeholder="وصف"></textarea>
                                <button class="btn btn-primary mt-3">تقديم</button>
                            </form>
                        </div>

                    </div>


                </div>

                <div class="col-md-3 mb-5 mt-4 mt-md-0">

                    <div class="row mb-3">
                        <div class="col-12 mb-2">
                            <div class="provider-user-img-container m-auto" style="width: 100px; height: 100px;">
                                <img src="{{asset('client/images/user.svg')}}">
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <h3>محمد علي</h3>
                            <div class="mb-2">
                            <span class="stars">
                                <i class="fa fa-star filled-star"></i>
                                <i class="fa fa-star filled-star"></i>
                                <i class="fa fa-star filled-star"></i>
                                <i class="fa fa-star filled-star"></i>
                                <i class="fa fa-star-o"></i>
                            </span>
                                <span>
                                /
                                <i class="fa fa-thumbs-o-up"></i>
                                5
                                (4 تقييم)
                            </span>
                            </div>
                            <div class="mb-3">
                                <button class="checked-btn" disabled="">
                                    <span class="checked-btn-icon"><i class="fa fa-check sp-tags-icon"></i></span>
                                    معتمد
                                </button>
                            </div>
                        </div>
                        <a href="#" class="show-location-btn m-auto" data-toggle="modal" data-target="#locationModel">اظهار الموقع</a>
                        <div class="modal fade" id="locationModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">الموقع</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4825851.352956702!2d-4.064941!3d53.800650999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2suk!4v1575040192325!5m2!1sen!2suk" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row text-right mt-5 mb-4">
                        <div class="col-12 row">
                            <div class="col-2 mr-1">
                                <div class="contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 52 52" style="enable-background:new 0 0 52 52;" xml:space="preserve">
<path style="fill:#1081E0;" d="M38.853,5.324L38.853,5.324c-7.098-7.098-18.607-7.098-25.706,0h0  C6.751,11.72,6.031,23.763,11.459,31L26,52l14.541-21C45.969,23.763,45.249,11.72,38.853,5.324z M26.177,24c-3.314,0-6-2.686-6-6  s2.686-6,6-6s6,2.686,6,6S29.491,24,26.177,24z"/>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
</svg>
                                </div>
                            </div>
                            <div class="col-6 ml-auto p-0">
                                <h3 class="m-0" style="color: #7f7f7f;">الموقع</h3>
                                <h5 class="m-0" style="color: #c3c3c3;">السعودية مدينة جدة</h5>
                            </div>
                        </div>
                    </div>
                    <div class="contact-section row text-right mb-4">
                        <div class="col-12 row">
                            <div class="col-2 mr-1">
                                <div class="contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 480.56 480.56" style="enable-background:new 0 0 480.56 480.56;" xml:space="preserve">
<g>
    <g>
        <path d="M365.354,317.9c-15.7-15.5-35.3-15.5-50.9,0c-11.9,11.8-23.8,23.6-35.5,35.6c-3.2,3.3-5.9,4-9.8,1.8    c-7.7-4.2-15.9-7.6-23.3-12.2c-34.5-21.7-63.4-49.6-89-81c-12.7-15.6-24-32.3-31.9-51.1c-1.6-3.8-1.3-6.3,1.8-9.4    c11.9-11.5,23.5-23.3,35.2-35.1c16.3-16.4,16.3-35.6-0.1-52.1c-9.3-9.4-18.6-18.6-27.9-28c-9.6-9.6-19.1-19.3-28.8-28.8    c-15.7-15.3-35.3-15.3-50.9,0.1c-12,11.8-23.5,23.9-35.7,35.5c-11.3,10.7-17,23.8-18.2,39.1c-1.9,24.9,4.2,48.4,12.8,71.3    c17.6,47.4,44.4,89.5,76.9,128.1c43.9,52.2,96.3,93.5,157.6,123.3c27.6,13.4,56.2,23.7,87.3,25.4c21.4,1.2,40-4.2,54.9-20.9    c10.2-11.4,21.7-21.8,32.5-32.7c16-16.2,16.1-35.8,0.2-51.8C403.554,355.9,384.454,336.9,365.354,317.9z"/>
        <path d="M346.254,238.2l36.9-6.3c-5.8-33.9-21.8-64.6-46.1-89c-25.7-25.7-58.2-41.9-94-46.9l-5.2,37.1    c27.7,3.9,52.9,16.4,72.8,36.3C329.454,188.2,341.754,212,346.254,238.2z"/>
        <path d="M403.954,77.8c-42.6-42.6-96.5-69.5-156-77.8l-5.2,37.1c51.4,7.2,98,30.5,134.8,67.2c34.9,34.9,57.8,79,66.1,127.5    l36.9-6.3C470.854,169.3,444.354,118.3,403.954,77.8z"/>
    </g>
</g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
</svg>
                                </div>
                            </div>
                            <div class="col-6 ml-auto p-0">
                                <h3 class="m-0" style="color: #7f7f7f;">رقم الهاتف</h3>
                                <h5 class="m-0" style="color: #c3c3c3;">9664788532547</h5>
                            </div>
                        </div>
                    </div>
                    <div class="contact-section row text-right mb-4">
                        <div class="col-12 row">
                            <div class="col-2 mr-1">
                                <div class="contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 308 308" style="enable-background:new 0 0 308 308;" xml:space="preserve">
<g id="XMLID_468_">
    <path id="XMLID_469_" d="M227.904,176.981c-0.6-0.288-23.054-11.345-27.044-12.781c-1.629-0.585-3.374-1.156-5.23-1.156   c-3.032,0-5.579,1.511-7.563,4.479c-2.243,3.334-9.033,11.271-11.131,13.642c-0.274,0.313-0.648,0.687-0.872,0.687   c-0.201,0-3.676-1.431-4.728-1.888c-24.087-10.463-42.37-35.624-44.877-39.867c-0.358-0.61-0.373-0.887-0.376-0.887   c0.088-0.323,0.898-1.135,1.316-1.554c1.223-1.21,2.548-2.805,3.83-4.348c0.607-0.731,1.215-1.463,1.812-2.153   c1.86-2.164,2.688-3.844,3.648-5.79l0.503-1.011c2.344-4.657,0.342-8.587-0.305-9.856c-0.531-1.062-10.012-23.944-11.02-26.348   c-2.424-5.801-5.627-8.502-10.078-8.502c-0.413,0,0,0-1.732,0.073c-2.109,0.089-13.594,1.601-18.672,4.802   c-5.385,3.395-14.495,14.217-14.495,33.249c0,17.129,10.87,33.302,15.537,39.453c0.116,0.155,0.329,0.47,0.638,0.922   c17.873,26.102,40.154,45.446,62.741,54.469c21.745,8.686,32.042,9.69,37.896,9.69c0.001,0,0.001,0,0.001,0   c2.46,0,4.429-0.193,6.166-0.364l1.102-0.105c7.512-0.666,24.02-9.22,27.775-19.655c2.958-8.219,3.738-17.199,1.77-20.458   C233.168,179.508,230.845,178.393,227.904,176.981z"/>
    <path id="XMLID_470_" d="M156.734,0C73.318,0,5.454,67.354,5.454,150.143c0,26.777,7.166,52.988,20.741,75.928L0.212,302.716   c-0.484,1.429-0.124,3.009,0.933,4.085C1.908,307.58,2.943,308,4,308c0.405,0,0.813-0.061,1.211-0.188l79.92-25.396   c21.87,11.685,46.588,17.853,71.604,17.853C240.143,300.27,308,232.923,308,150.143C308,67.354,240.143,0,156.734,0z    M156.734,268.994c-23.539,0-46.338-6.797-65.936-19.657c-0.659-0.433-1.424-0.655-2.194-0.655c-0.407,0-0.815,0.062-1.212,0.188   l-40.035,12.726l12.924-38.129c0.418-1.234,0.209-2.595-0.561-3.647c-14.924-20.392-22.813-44.485-22.813-69.677   c0-65.543,53.754-118.867,119.826-118.867c66.064,0,119.812,53.324,119.812,118.867   C276.546,215.678,222.799,268.994,156.734,268.994z"/>
</g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
</svg>
                                </div>
                            </div>
                            <div class="col-6 ml-auto p-0">
                                <h3 class="m-0" style="color: #7f7f7f;">واتس اب</h3>
                                <h5 class="m-0" style="color: #c3c3c3;">9664788532547</h5>
                            </div>
                        </div>
                    </div>
                    <div class="contact-section row text-right mb-4">
                        <div class="col-12 row">
                            <div class="col-2 mr-1">
                                <div class="contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 496 496" style="enable-background:new 0 0 496 496;" xml:space="preserve">
<g>
    <g>
        <g>
            <path d="M400.32,306.768c-0.384-0.336-0.816-0.656-1.232-0.96c-0.32-0.208-0.624-0.4-0.944-0.608     c-0.112-0.064-0.24-0.144-0.368-0.224c-0.096-0.064-0.208-0.128-0.336-0.192c-4.224-2.464-8.192-3.488-11.344-4.288     c-0.432-0.144-0.896-0.288-1.344-0.416c-10.72-3.552-21.168-11.344-29.44-21.936c-3.872-5.04-6.96-10.032-9.184-14.944     c0.368-0.176,0.784-0.336,1.248-0.528c0.4-0.096,0.8-0.208,1.2-0.352c6.944-2.4,14.272-5.216,21.68-11.168     c0.64-0.48,1.248-0.976,1.824-1.52c1.712-1.664,3.936-4.016,5.664-7.456c2.944-5.696,3.28-12.688,0.944-18.624     c-0.208-0.576-0.432-1.12-0.688-1.648c-3.76-7.664-9.984-11.2-12.64-12.72c-6.72-3.808-14.928-4.784-22.496-2.576     c0.048-1.248,0.08-2.496,0.096-3.696l0.048-1.936c0.304-10.352,0.624-21.072-0.992-32.464c0-0.048,0-0.08-0.016-0.128     c-0.032-0.288-0.08-0.544-0.128-0.832c-3.904-21.072-17.168-40.928-36.432-54.496c-12.608-8.816-27.904-14.272-44.048-15.76     c-4.352-0.432-8.672-0.624-12.992-0.624l-1.76,0.016c-16.16,0.096-39.632,3.52-59.68,19.232     c-12.72,9.92-22.816,23.072-29.392,38.496c-6.064,15.328-5.824,30.272-4.992,45.392l0.384,6.688     c0.016,0.24,0.032,0.448,0.048,0.672l-1.824-0.544c-0.352-0.112-0.72-0.208-1.056-0.288c-7.408-1.616-15.264-0.048-21.632,4.336     c-0.336,0.208-0.64,0.416-0.96,0.656c-9.232,6.352-11.44,14.368-11.68,20.624c0,1.008,0.16,2.848,0.368,3.84     c1.056,5.504,4.112,10.624,8.576,14.384c1.28,1.072,2.48,1.936,3.792,2.8c0.368,0.32,0.768,0.608,1.152,0.864     c6.448,4.32,13.088,6.672,18.416,8.56l2.096,0.832c-0.256,0.592-0.576,1.28-0.96,2.08c-5.776,11.376-14.288,21.136-24.608,28.208     c-5.024,3.44-10.944,6.128-17.072,7.792v0.048c-0.688,0.16-1.36,0.368-1.696,0.464c-2.832,0.816-10.384,2.976-15.12,10.16     c-0.928,1.248-2.064,3.44-2.592,4.912c-2.608,7.328-1.04,15.696,3.968,21.664c2.672,3.264,5.584,5.152,7.664,6.304     c0.096,0.048,0.176,0.096,0.256,0.144v0.016c7.808,4.48,15.904,6.512,22.4,8.16l1.584,0.384c0.272,0.08,0.528,0.144,0.816,0.208     l0.16,0.048c0.064,0.016,0.144,0.016,0.208,0.032l3.088,0.656c0.512,2.32,1.056,4.72,1.76,7.04     c2.016,6.848,7.616,12.08,14.816,13.68c4.656,0.976,9.536,0.272,11.968-0.464c9.84-1.68,18.944-2.624,24.496-1.232     c5.44,1.424,11.184,5.136,17.84,9.44c2.464,1.6,4.944,3.184,7.488,4.736c0.096,0.08,0.208,0.144,0.336,0.224     c8.496,5.28,18.928,10.752,31.664,11.232c2.096,0.112,4.192,0.16,6.272,0.16c5.392,0,10.688-0.32,14.88-0.576     c0.528,0,1.168-0.032,1.696-0.08c7.936-0.784,15.6-3.36,22.288-7.472c0.096-0.048,0.176-0.112,0.272-0.16     c4.208-2.416,8.256-4.976,12.224-7.504c5.84-3.728,11.36-7.248,16.704-9.648c0.992-0.16,2.928-0.256,4.4-0.336l2.928-0.176     c0.016,0,0.048-0.016,0.064-0.016l4.352-0.064c6.336,0,12.8,0.432,18.88,1.248c1.488,0.24,3.872,0.256,5.344,0.096     c5.344-0.656,10.512-3.584,13.6-7.616c2.784-3.52,3.616-6.848,3.744-7.344c0.112-0.336,0.224-0.704,0.32-1.056     c0-0.016,0.016-0.032,0.016-0.048l1.024-3.552c0.016-0.096,0.048-0.192,0.08-0.304c7.088-1.216,13.248-3.488,18.8-5.504     l1.92-0.704c0.576-0.208,1.152-0.432,1.712-0.688l0.016,0.016c3.152-1.28,9.728-3.968,14.608-10.784     c0.256-0.336,0.464-0.688,0.688-1.04c3.056-4.768,4.144-10.592,3.008-16.16C407.472,314.64,404.528,309.984,400.32,306.768z      M344.352,330.432c-3.136,3.584-4.88,7.536-6.128,11.36c-6.176-0.496-12.288-0.624-18.448-0.448c-0.384,0-0.768,0.016-1.12,0.048     l-2.896,0.16c-4.24,0.24-9.024,0.496-13.936,2.256c-0.736,0.272-1.44,0.608-2.112,0.96c-7.392,3.344-14.096,7.6-20.576,11.744     c-3.408,2.144-6.832,4.352-10.432,6.432c-0.464,0.24-0.928,0.48-1.36,0.768c-2.624,1.68-5.712,2.736-8.528,3.008     c-4.544,0.288-9.152,0.608-13.824,0.608c-1.136,0-2.272-0.032-3.776-0.08c-0.384-0.048-0.8-0.08-1.216-0.016     c-5.216-0.192-10.592-3.056-15.664-6.176c-0.208-0.128-0.4-0.256-0.608-0.384c-2.416-1.456-4.768-2.976-7.104-4.48     c-8.224-5.312-16.72-10.816-27.312-13.584c-9.344-2.32-20.56-1.984-31.024-0.4c-0.288-1.088-0.656-2.224-1.088-3.488     l-0.816-2.096c-0.192-0.544-0.72-1.856-0.992-2.384c-1.712-3.392-4.544-6.08-8.048-7.568c-3.552-1.52-7.008-2.32-10.384-3.008     c2-1.152,3.936-2.368,5.84-3.648c14.768-10.128,26.88-24.016,35.152-40.304c3.392-6.864,7.024-16.032,4.704-25.856     c-1.216-5.2-4.144-9.824-8.592-13.616c5.168-1.808,9.264-6.48,10.592-11.856c0.176-0.736,0.32-1.488,0.4-2.256     c0.752-7.44,0.288-14.656-0.16-21.648l-0.368-6.32c-0.656-11.984-0.896-22.656,2.656-31.648     c4.272-10,10.992-18.768,19.488-25.392c10.096-7.92,24.368-12.336,41.728-12.448c3.216,0,6.448,0.128,9.92,0.48     c10.768,0.992,20.72,4.48,28.752,10.096c12.32,8.688,20.8,20.976,23.28,33.792c1.216,8.688,0.96,17.584,0.672,27.008     l-0.064,2.256c-0.032,2.496-0.144,4.976-0.24,7.408c-0.192,4.48-0.352,8.864-0.208,13.184c0,0.24,0.192,2.768,0.208,3.008     c0.48,6.208,4.528,11.584,10.368,13.776c0.544,0.208,1.104,0.384,1.68,0.56c-1.952,1.6-3.776,3.472-5.392,5.664     c-0.016,0.032-0.048,0.064-0.064,0.096c-4.64,6.224-5.76,14.64-3.168,23.248c0.16,0.56,0.32,1.12,0.528,1.664     c3.376,9.024,8.512,18.016,15.328,26.832c8.416,10.8,18.272,19.488,29.088,25.696     C353.616,323.968,348.672,326.176,344.352,330.432z"/>
            <path d="M363.968,0H131.984C59.2,0,0,59.2,0,131.984v231.984C0,436.768,59.2,496,131.984,496h231.984     C436.768,496,496,436.768,496,363.968V131.984C496,59.2,436.768,0,363.968,0z M464,363.968C464,419.12,419.12,464,363.968,464     H131.984C76.864,464,32,419.12,32,363.968V131.984C32,76.864,76.864,32,131.984,32h231.984C419.12,32,464,76.864,464,131.984     V363.968z"/>
        </g>
    </g>
</g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
</svg>
                                </div>
                            </div>
                            <div class="col-6 ml-auto p-0">
                                <h3 class="m-0" style="color: #7f7f7f;">سناب شات</h3>
                                <h5 class="m-0" style="color: #c3c3c3;">@nas Tabanaj</h5>
                            </div>
                        </div>
                    </div>
                    <div class="contact-section row text-right mb-4">
                        <div class="col-12 row">
                            <div class="col-2 mr-1">
                                <div class="contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="16" height="16" viewBox="0 0 16 16">
                                        <path fill="#2386c9" d="M16 3c-0.6 0.3-1.2 0.4-1.9 0.5 0.7-0.4 1.2-1 1.4-1.8-0.6 0.4-1.3 0.6-2.1 0.8-0.6-0.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 0.3 0 0.5 0.1 0.7-2.7-0.1-5.2-1.4-6.8-3.4-0.3 0.5-0.4 1-0.4 1.7 0 1.1 0.6 2.1 1.5 2.7-0.5 0-1-0.2-1.5-0.4 0 0 0 0 0 0 0 1.6 1.1 2.9 2.6 3.2-0.3 0.1-0.6 0.1-0.9 0.1-0.2 0-0.4 0-0.6-0.1 0.4 1.3 1.6 2.3 3.1 2.3-1.1 0.9-2.5 1.4-4.1 1.4-0.3 0-0.5 0-0.8 0 1.5 0.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3 0-0.1 0-0.3 0-0.4 0.7-0.5 1.3-1.1 1.7-1.8z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="col-6 ml-auto p-0">
                                <h3 class="m-0" style="color: #7f7f7f;">تويتر</h3>
                                <h5 class="m-0" style="color: #c3c3c3;">@nas Tabanaj</h5>
                            </div>
                        </div>
                    </div>
                    <div class="contact-section row text-right mb-4">
                        <div class="col-12 row">
                            <div class="col-2 mr-1">
                                <div class="contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="169.063px" height="169.063px" viewBox="0 0 169.063 169.063" style="enable-background:new 0 0 169.063 169.063;" xml:space="preserve">
<g>
    <path d="M122.406,0H46.654C20.929,0,0,20.93,0,46.655v75.752c0,25.726,20.929,46.655,46.654,46.655h75.752   c25.727,0,46.656-20.93,46.656-46.655V46.655C169.063,20.93,148.133,0,122.406,0z M154.063,122.407   c0,17.455-14.201,31.655-31.656,31.655H46.654C29.2,154.063,15,139.862,15,122.407V46.655C15,29.201,29.2,15,46.654,15h75.752   c17.455,0,31.656,14.201,31.656,31.655V122.407z"/>
    <path d="M84.531,40.97c-24.021,0-43.563,19.542-43.563,43.563c0,24.02,19.542,43.561,43.563,43.561s43.563-19.541,43.563-43.561   C128.094,60.512,108.552,40.97,84.531,40.97z M84.531,113.093c-15.749,0-28.563-12.812-28.563-28.561   c0-15.75,12.813-28.563,28.563-28.563s28.563,12.813,28.563,28.563C113.094,100.281,100.28,113.093,84.531,113.093z"/>
    <path d="M129.921,28.251c-2.89,0-5.729,1.17-7.77,3.22c-2.051,2.04-3.23,4.88-3.23,7.78c0,2.891,1.18,5.73,3.23,7.78   c2.04,2.04,4.88,3.22,7.77,3.22c2.9,0,5.73-1.18,7.78-3.22c2.05-2.05,3.22-4.89,3.22-7.78c0-2.9-1.17-5.74-3.22-7.78   C135.661,29.421,132.821,28.251,129.921,28.251z"/>
</g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
</svg>
                                </div>
                            </div>
                            <div class="col-6 ml-auto p-0">
                                <h3 class="m-0" style="color: #7f7f7f;">انستجرام</h3>
                                <h5 class="m-0" style="color: #c3c3c3;">@nas Tabanaj</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <hr>
                    </div>

                    <div class="col-12 text-center mb-5">
                        <h3>أوقات العمل</h3>
                    </div>

                    <div class="col-7 row mb-2">
                        <div class="col-5 mr-auto text-right pt-2">
                            <h5>الاثنين</h5>
                        </div>
                        <div class="col-5 ml-auto text-right week-value">
                            08:00 <br>
                            18:00
                        </div>
                    </div>

                    <div class="col-7 row mb-2">
                        <div class="col-5 mr-auto text-right pt-2">
                            <h5>الثلاثاء</h5>
                        </div>
                        <div class="col-5 ml-auto text-right week-value">
                            08:00 <br>
                            18:00
                        </div>
                    </div>

                    <div class="col-7 row mb-2 active-week-day pt-1">
                        <div class="col-5 mr-auto text-right pt-2">
                            <h5>الاربعاء</h5>
                        </div>
                        <div class="col-5 ml-auto text-right week-value">
                            08:00 <br>
                            18:00
                        </div>
                    </div>

                    <div class="col-7 row mb-2 pt-1">
                        <div class="col-5 mr-auto text-right pt-2">
                            <h5>الخميس</h5>
                        </div>
                        <div class="col-5 ml-auto text-right week-value">
                            08:00 <br>
                            18:00
                        </div>
                    </div>

                    <div class="col-7 row mb-2 pt-1">
                        <div class="col-5 mr-auto text-right pt-2">
                            <h5>الجمعة</h5>
                        </div>
                        <div class="col-5 ml-auto text-right week-value">
                            08:00 <br>
                            18:00
                        </div>
                    </div>

                    <div class="col-7 row mb-2 pt-1">
                        <div class="col-5 mr-auto text-right pt-2">
                            <h5>السبت</h5>
                        </div>
                        <div class="col-5 ml-auto text-right week-value">
                            08:00 <br>
                            18:00
                        </div>
                    </div>

                    <div class="col-7 row mb-2 pt-1">
                        <div class="col-5 mr-auto text-right pt-2">
                            <h5>الاحد</h5>
                        </div>
                        <div class="col-5 ml-auto text-right week-value">
                            08:00 <br>
                            18:00
                        </div>
                    </div>

                    <div class="col-12">
                        <hr>
                    </div>

                    <div class="col-12 text-center">
                        <h4>أفضل مقدمي الخدمات بين يديك <span style="color: #2386c9;">مجالات تك</span> - لكل ما تحتاج </h4>
                        <p class="mb-0 mt-3">قم يتحميل التطبيق وتمتع بتلبية طلباتك مجاناً</p>
                        <div class="mt-2">
                            <a href="{{$setting->android_link}}">
                                <img src="{{asset('client/images/google_play.png')}}" width="128" height="40">
                            </a>
                            <a href="{{$setting->ios_link}}">
                                <img src="{{asset('client/images/apple_store.png')}}" width="128" height="40">
                            </a>
                        </div>
                        <div class="mt-3">
                            <span><a href="{{$setting->facebook}}" class="footer-social-link" style="background-color: #3B5998"><i class="fa fa-facebook"></i></a></span>
                            <span><a href="{{$setting->twitter}}" class="footer-social-link" style="background-color: #55acee"><i class="fa fa-twitter"></i></a></span>
                            <span><a href="{{$setting->instagram}}" class="footer-social-link" style="background-color: #c358b0"><i class="fa fa-instagram"></i></a></span>
                            <span><a href="{{$setting->whatsapp}}" class="footer-social-link" style="background-color: #60cb5c"><i class="fa fa-whatsapp"></i></a></span>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

@endsection
