    <!-- start: page footer -->
    <footer class="page-footer px-xl-4 px-sm-2 px-0 py-3 w-100" style="background-color:#fff;">
        <div class="container-fluid d-flex flex-wrap justify-content-between align-items-center">
            <p class="col-md-4 mb-0 text-muted">© @php echo date('Y'); @endphp <span title="Legal Recovery" class="text-black">Legal Recovery</a>, All Rights Reserved.</p>
            <a href="#" class="col-md-4 d-flex align-items-center justify-content-center my-3 my-lg-0 me-lg-auto">
                {{-- <svg height="18" viewBox="0 0 67 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="fill-muted" d="M0.863281 18.9997V1.14968H3.11328V16.9997H10.9133V18.9997H0.863281Z"/>
                    <path class="fill-muted" d="M27.3045 12.6997C27.3045 13.933 27.0545 15.0497 26.5545 16.0497C26.0545 17.033 25.2878 17.8163 24.2545 18.3997C23.2378 18.9663 21.9378 19.2497 20.3545 19.2497C18.1378 19.2497 16.4462 18.6497 15.2795 17.4497C14.1295 16.233 13.5545 14.633 13.5545 12.6497V1.14968H15.8045V12.7247C15.8045 14.1747 16.1878 15.2997 16.9545 16.0997C17.7378 16.8997 18.9128 17.2997 20.4795 17.2997C21.5628 17.2997 22.4378 17.108 23.1045 16.7247C23.7878 16.3247 24.2878 15.783 24.6045 15.0997C24.9212 14.3997 25.0795 13.5997 25.0795 12.6997V1.14968H27.3045V12.6997Z"/>
                    <path class="fill-secondary" d="M46.5286 0.765681C46.6246 0.82568 46.6726 0.92168 46.6726 1.05368L46.5466 18.6037C46.5466 18.8677 46.3906 18.9937 46.0786 18.9817H44.4586L33.1546 3.62768L33.1006 13.1677L37.5646 13.1857C37.6726 13.1857 37.7626 13.2217 37.8346 13.2937C37.9186 13.3657 37.9606 13.4617 37.9606 13.5817L37.9426 14.8957C37.9426 15.0157 37.9066 15.1237 37.8346 15.2197C37.7626 15.3037 37.6666 15.3457 37.5466 15.3457L31.3726 15.2917H31.3546C31.1026 15.2917 30.9706 15.1837 30.9586 14.9677L31.0666 0.98168C31.0666 0.849679 31.1026 0.74768 31.1746 0.675681C31.2586 0.59168 31.3666 0.555679 31.4986 0.56768H33.1726C33.3406 0.56768 33.4726 0.63368 33.5686 0.765681L44.4406 15.4177L44.5486 0.94568C44.5966 0.741679 44.7286 0.639679 44.9446 0.639679L46.2046 0.65768C46.3126 0.65768 46.4206 0.69368 46.5286 0.765681ZM39.7786 16.7857C39.8986 16.7977 39.9946 16.8397 40.0666 16.9117C40.1386 16.9717 40.1746 17.0677 40.1746 17.1997L40.1566 18.4957C40.1566 18.6157 40.1206 18.7237 40.0486 18.8197C39.9886 18.9037 39.8926 18.9457 39.7606 18.9457H31.3546C31.2346 18.9457 31.1386 18.9097 31.0666 18.8377C30.9946 18.7657 30.9586 18.6697 30.9586 18.5497V17.2357C30.9586 17.1157 30.9946 17.0137 31.0666 16.9297C31.1386 16.8337 31.2406 16.7857 31.3726 16.7857H35.5666C38.0266 16.7857 39.4306 16.7857 39.7786 16.7857Z"/>
                    <path class="fill-muted" d="M66.0301 10.0497C66.0301 11.433 65.8551 12.6913 65.5051 13.8247C65.1551 14.9413 64.6301 15.908 63.9301 16.7247C63.2467 17.5413 62.3884 18.1663 61.3551 18.5997C60.3384 19.033 59.1551 19.2497 57.8051 19.2497C56.4051 19.2497 55.1884 19.033 54.1551 18.5997C53.1217 18.1497 52.2634 17.5247 51.5801 16.7247C50.8967 15.908 50.3884 14.933 50.0551 13.7997C49.7217 12.6663 49.5551 11.408 49.5551 10.0247C49.5551 8.19135 49.8551 6.59135 50.4551 5.22468C51.0551 3.85801 51.9634 2.79135 53.1801 2.02468C54.4134 1.25801 55.9634 0.87468 57.8301 0.87468C59.6134 0.87468 61.1134 1.25801 62.3301 2.02468C63.5467 2.77468 64.4634 3.84135 65.0801 5.22468C65.7134 6.59135 66.0301 8.19968 66.0301 10.0497ZM51.9301 10.0497C51.9301 11.5497 52.1384 12.8413 52.5551 13.9247C52.9717 15.008 53.6134 15.8413 54.4801 16.4247C55.3634 17.008 56.4717 17.2997 57.8051 17.2997C59.1551 17.2997 60.2551 17.008 61.1051 16.4247C61.9717 15.8413 62.6134 15.008 63.0301 13.9247C63.4467 12.8413 63.6551 11.5497 63.6551 10.0497C63.6551 7.79968 63.1884 6.04135 62.2551 4.77468C61.3217 3.49135 59.8467 2.84968 57.8301 2.84968C56.4801 2.84968 55.3634 3.14135 54.4801 3.72468C53.6134 4.29135 52.9717 5.11635 52.5551 6.19968C52.1384 7.26635 51.9301 8.54968 51.9301 10.0497Z"/>
                </svg> --}}
            </a>
            <ul class="nav col-md-4 justify-content-center justify-content-lg-end">
                {{-- <li class="nav-item"><a href="" target="_blank" class="nav-link px-2 text-muted">Report Issue</a></li> --}}
                {{-- <li class="nav-item"><a href="" target="_blank" class="nav-link px-2 text-muted">licenses</a></li>
                <li class="nav-item"><a href="" target="_blank" class="nav-link px-2 text-muted">Support</a></li>
                <li class="nav-item"><a href="" target="_blank" class="nav-link px-2 text-muted">FAQs</a></li> --}}
            </ul>
        </div>
    </footer>


</div>

<!-- Modal: Create project -->
<div class="modal fade" id="CreateNew" tabindex="-1">
    <div class="modal-dialog modal-dialog-vertical modal-dialog-scrollable">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title">Setup new project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="progress bg-transparent" style="height: 3px;">
                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="5" style="width: 20%;"></div>
            </div>
            <div class="modal-body custom_scroll">
                <ul class="nav nav-tabs tab-card border-0 fs-6" role="tablist">
                    <li class="nav-item flex-fill text-center"><a class="nav-link active" href="#step1" data-bs-toggle="tab" data-bs-step="1">1. Project</a></li>
                    <li class="nav-item flex-fill text-center"><a class="nav-link" href="#step2" data-bs-toggle="tab" data-bs-step="3">2. Team</a></li>
                    <li class="nav-item flex-fill text-center"><a class="nav-link" href="#step3" data-bs-toggle="tab" data-bs-step="4">3. File</a></li>
                    <li class="nav-item flex-fill text-center"><a class="nav-link" href="#step4" data-bs-toggle="tab" data-bs-step="5">4. Completed</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="step1">
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6 class="card-title mb-1">Project Type</h6>
                                <p class="text-muted small">If you need more info, please check out <a href="#">FAQ Page</a></p>
                                <!-- Custome redio input -->
                                <div class="c_radio d-flex flex-md-wrap">
                                    <label class="m-1 w-100" for="Personal">
                                        <input type="radio" name="plan" id="Personal" checked />
                                        <span class="card">
                                            <span class="card-body d-flex p-3">
                                                <svg class="avatar" viewBox="0 0 16 16">
                                                    <path class="fill-muted" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                </svg>
                                                <span class="ms-3">
                                                    <span class="h6 d-flex mb-1">Personal Project</span>
                                                    <span class="text-muted">For smaller business, with simple salaries and pay schedules.</span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                    <label class="m-1 w-100" for="Team">
                                        <input type="radio" name="plan" id="Team"/>
                                        <span class="card">
                                            <span class="card-body d-flex p-3">
                                                <svg class="avatar" viewBox="0 0 16 16">
                                                    <path class="fill-muted" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                    <path class="fill-muted" fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                                    <path class="fill-muted" d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                                </svg>
                                                <span class="ms-3">
                                                    <span class="h6 d-flex mb-1">Team Project</span>
                                                    <span class="text-muted">For growing business who wants to create a rewarding place to work.</span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6 class="card-title mb-1">Project Details</h6>
                                <p class="text-muted small">It is a long established fact that a reader will be distracted by Luno.</p>
                                <div class="form-floating mb-2">
                                    <select class="form-select">
                                    <option selected>Open this select menu</option>
                                    <option value="1">Lucid</option>
                                    <option value="2">LUNO</option>
                                    <option value="3">Luno</option>
                                    </select>
                                    <label>Choose a Customer *</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" placeholder="Project name">
                                    <label>Project name *</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <textarea class="form-control" placeholder="Add project details" style="height: 100px"></textarea>
                                    <label>Add project details</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="date" class="form-control">
                                    <label>Enter release Date *</label>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="text-muted">Allow Notifications *</div>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="allow_phone" value="option1">
                                            <label class="form-check-label" for="allow_phone">Phone</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="allow_email" value="option2">
                                            <label class="form-check-label" for="allow_email">Email</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-lg bg-secondary text-light next text-uppercase">Add People</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="step2">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="card-title mb-1">Build a Team</h6>
                                <p class="text-muted small">If you need more info, please check out <a href="#">Project Guidelines</a></p>
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" placeholder="Invite Teammates">
                                    <label>Invite Teammates</label>
                                </div>
                                <h6 class="card-title mb-1">Team Members</h6>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="list-group6" checked="">
                                    <label class="form-check-label text-muted" for="list-group6">Adding Users by Team Members</label>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush list-group-custom custom_scroll mb-0" style="height: 300px;">
                                <li class="list-group-item d-flex align-items-center">
                                    <img class="avatar rounded" src="../dist/assets/images/xs/avatar1.jpg" alt="">
                                    <div class="flex-fill ms-2">
                                        <div class="h6 mb-0">Chris Fox</div>
                                        <small class="text-muted">Angular Developer</small>
                                    </div>
                                    <select class="form-select rounded-pill form-select-sm w120">
                                        <option value="1">Owner</option>
                                        <option value="2">Can Edit</option>
                                        <option value="3">Guest</option>
                                    </select>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <img class="avatar rounded" src="../dist/assets/images/xs/avatar2.jpg" alt="">
                                    <div class="flex-fill ms-2">
                                        <div class="h6 mb-0">Joge Lucky</div>
                                        <small class="text-muted">ReactJs Developer</small>
                                    </div>
                                    <select class="form-select rounded-pill form-select-sm w120">
                                        <option value="1">Owner</option>
                                        <option value="2">Can Edit</option>
                                        <option value="3">Guest</option>
                                    </select>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <img class="avatar rounded" src="../dist/assets/images/xs/avatar3.jpg" alt="">
                                    <div class="flex-fill ms-2">
                                        <div class="h6 mb-0">Chris Fox</div>
                                        <small class="text-muted">NodeJs Developer</small>
                                    </div>
                                    <select class="form-select rounded-pill form-select-sm w120">
                                        <option value="1">Owner</option>
                                        <option value="2">Can Edit</option>
                                        <option value="3">Guest</option>
                                    </select>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <img class="avatar rounded" src="../dist/assets/images/xs/avatar4.jpg" alt="">
                                    <div class="flex-fill ms-2">
                                        <div class="h6 mb-0">Chris Fox</div>
                                        <small class="text-muted">Sr. Designer</small>
                                    </div>
                                    <select class="form-select rounded-pill form-select-sm w120">
                                        <option value="1">Owner</option>
                                        <option value="2">Can Edit</option>
                                        <option value="3">Guest</option>
                                    </select>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <img class="avatar rounded" src="../dist/assets/images/xs/avatar5.jpg" alt="">
                                    <div class="flex-fill ms-2">
                                        <div class="h6 mb-0">Chris Fox</div>
                                        <small class="text-muted">Designer</small>
                                    </div>
                                    <select class="form-select rounded-pill form-select-sm w120">
                                        <option value="1">Owner</option>
                                        <option value="2">Can Edit</option>
                                        <option value="3">Guest</option>
                                    </select>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <img class="avatar rounded" src="../dist/assets/images/xs/avatar6.jpg" alt="">
                                    <div class="flex-fill ms-2">
                                        <div class="h6 mb-0">Chris Fox</div>
                                        <small class="text-muted">Front-End Developer</small>
                                    </div>
                                    <select class="form-select rounded-pill form-select-sm w120">
                                        <option value="1">Owner</option>
                                        <option value="2">Can Edit</option>
                                        <option value="3">Guest</option>
                                    </select>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <img class="avatar rounded" src="../dist/assets/images/xs/avatar7.jpg" alt="">
                                    <div class="flex-fill ms-2">
                                        <div class="h6 mb-0">Chris Fox</div>
                                        <small class="text-muted">QA</small>
                                    </div>
                                    <select class="form-select rounded-pill form-select-sm w120">
                                        <option value="1">Owner</option>
                                        <option value="2">Can Edit</option>
                                        <option value="3">Guest</option>
                                    </select>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <img class="avatar rounded" src="../dist/assets/images/xs/avatar8.jpg" alt="">
                                    <div class="flex-fill ms-2">
                                        <div class="h6 mb-0">Chris Fox</div>
                                        <small class="text-muted">Laravel Developer</small>
                                    </div>
                                    <select class="form-select rounded-pill form-select-sm w120">
                                        <option value="1">Owner</option>
                                        <option value="2">Can Edit</option>
                                        <option value="3">Guest</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-lg bg-secondary text-light next text-uppercase">Select Files</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="step3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="card-title mb-1">Upload Files</h6>
                                <div class="mb-4">
                                    <label class="form-label small">Upload up to 10 files</label>
                                    <input class="form-control" type="file" multiple>
                                </div>
                                <span>Already Uploaded File</span>
                            </div>
                            <ul class="list-group list-group-flush list-group-custom custom_scroll mb-0" style="height: 300px;">
                                <li class="list-group-item py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar rounded no-thumbnail"><i class="fa fa-file-pdf-o text-danger"></i></div>
                                        <div class="flex-fill ms-3 text-truncate">
                                            <p class="mb-0 color-800">Annual Sales Report 2018-19</p>
                                            <small class="text-muted">.pdf, 5.3 MB</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar rounded no-thumbnail"><i class="fa fa-file-excel-o text-success"></i></div>
                                        <div class="flex-fill ms-3 text-truncate">
                                            <p class="mb-0 color-800">Complete Product Sheet</p>
                                            <small class="text-muted">.xls, 2.1 MB</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar rounded no-thumbnail"><i class="fa fa-file-word-o text-info"></i></div>
                                        <div class="flex-fill ms-3 text-truncate">
                                            <p class="mb-0 color-800">Marketing Guidelines</p>
                                            <small class="text-muted">.doc, 2.3 MB</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar rounded no-thumbnail"><i class="fa fa-file-zip-o"></i></div>
                                        <div class="flex-fill ms-3 text-truncate">
                                            <p class="mb-0 color-800">Brand Photography</p>
                                            <small class="text-muted">.zip, 30.5 MB</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-lg bg-secondary text-light next text-uppercase">Advanced Options</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="step4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="card-title mb-1">Project Created!</h4>
                                <span class="text-muted">If you need more info, please check how to create project</span>
                            </div>
                            <div class="card-body">
                                <button class="btn btn-lg bg-light first text-uppercase">Cretae new project</button>
                                <button class="btn btn-lg bg-secondary text-light text-uppercase">View project</button>
                            </div>
                            <div class="card-body">
                                <img class="img-fluid" src="../dist/assets/images/project-team.svg" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal: Setting -->
<div class="modal fade" id="SettingsModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-vertical right-side modal-dialog-scrollable">
        <div class="modal-content">

            <div class="px-xl-4 modal-header">
                <h5 class="modal-title">Theme Setting</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="px-xl-4 modal-body custom_scroll">
                <!-- start: color setting -->
                <div class="card fieldset border border-primary p-3 setting-theme mb-4">
                    <span class="fieldset-tile text-primary bg-card">Color Settings</span>
                    <ul class="list-unstyled d-flex choose-skin mb-0">
                        <li data-theme="black"><div class="black"></div></li>
                        <li data-theme="indigo"><div class="indigo"></div></li>
                        <li data-theme="blue" class="active"><div class="blue"></div></li>
                        <li data-theme="cyan"><div class="cyan"></div></li>
                        <li data-theme="green"><div class="green"></div></li>
                        <li data-theme="orange"><div class="orange"></div></li>
                        <li data-theme="blush"><div class="blush"></div></li>
                        <li data-theme="red"><div class="red"></div></li>
                        <li data-theme="dynamic"><div class="dynamic"><i class="fa fa-paint-brush"></i></div></li>
                    </ul>
                    <!-- Settings: Theme dynamics -->
                    <div class="card fieldset border border-primary p-3 dt-setting mt-4">
                        <span class="fieldset-tile text-primary bg-card">Dynamic Color Settings</span>
                        <div class="row g-3">
                            <div class="col-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <button id="primaryColorPicker" class="btn bg-primary avatar xs me-2"></button>
                                        <label>Primary Color</label>
                                    </li>
                                    <li>
                                        <button id="secondaryColorPicker" class="btn bg-secondary avatar xs me-2"></button>
                                        <label>Secondary Color</label>
                                    </li>
                                    <li>
                                        <button id="BodyColorPicker" class="btn btn-outline-secondary bg-body avatar xs me-2"></button>
                                        <label>Site Background</label>
                                    </li>
                                    <li>
                                        <button id="CardColorPicker" class="btn btn-outline-secondary bg-card avatar xs me-2"></button>
                                        <label>Widget Background</label>
                                    </li>
                                    <li>
                                        <button id="BorderColorPicker" class="btn btn-outline-secondary bg-card avatar xs me-2"></button>
                                        <label>Border Color</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <button id="chartColorPicker1" class="btn chart-color1 avatar xs me-2"></button>
                                        <label>Chart Color 1</label>
                                    </li>
                                    <li>
                                        <button id="chartColorPicker2" class="btn chart-color2 avatar xs me-2"></button>
                                        <label>Chart Color 2</label>
                                    </li>
                                    <li>
                                        <button id="chartColorPicker3" class="btn chart-color3 avatar xs me-2"></button>
                                        <label>Chart Color 3</label>
                                    </li>
                                    <li>
                                        <button id="chartColorPicker4" class="btn chart-color4 avatar xs me-2"></button>
                                        <label>Chart Color 4</label>
                                    </li>
                                    <li>
                                        <button id="chartColorPicker5" class="btn chart-color5 avatar xs me-2"></button>
                                        <label>Chart Color 5</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- start: Light/dark -->
                <div class="card fieldset border setting-mode mb-4">
                    <span class="fieldset-tile bg-card">Light/Dark & Contrast Layout</span>
                    <div class="c_radio d-flex text-center">
                        <label class="m-1 theme-switch" for="theme-switch">
                            <input type="checkbox" id="theme-switch" />
                            <span class="card p-2">
                                <img class="img-fluid" src="{{url('assets/backend/images/dark-version.svg')}}" alt="Dark Mode" />
                            </span>
                        </label>
                        <label class="m-1 theme-dark" for="theme-switch-dark">
                            <input type="checkbox" id="theme-switch-dark" />
                            <span class="card p-2">
                                <img class="img-fluid" src="{{url('assets/backend/images/dark-theme.svg')}}" alt="Theme Dark Mode" />
                            </span>
                        </label>
                        <label class="m-1 theme-high-contrast" for="theme-high-contrast">
                            <input type="checkbox" id="theme-high-contrast"/>
                            <span class="card p-2">
                                <img class="img-fluid" src="{{url('assets/backend/images/high-version.svg')}}" alt="High Contrast" />
                            </span>
                        </label>
                        <label class="m-1 theme-rtl" for="theme-rtl">
                            <input type="checkbox" id="theme-rtl"/>
                            <span class="card p-2">
                                <img class="img-fluid" src="{{url('assets/backend/images/rtl-version.svg')}}" alt="RTL Mode!" />
                            </span>
                        </label>
                    </div>
                </div>
                <!-- start: Font setting -->
                <div class="card fieldset border setting-font mb-4">
                    <span class="fieldset-tile bg-card">Google Font Settings</span>
                    <div class="c_radio d-flex text-center font_setting">
                        <label class="m-1" for="font-opensans">
                            <input type="radio" name="font" id="font-opensans" value="font-opensans" />
                            <span class="card p-2">
                                <img class="img-fluid" src="{{url('assets/backend/images/font-opensans.svg')}}" alt="Dark Mode" />
                            </span>
                        </label>
                        <label class="m-1" for="font-quicksand">
                            <input type="radio" name="font" id="font-quicksand" value="font-quicksand" />
                            <span class="card p-2">
                                <img class="img-fluid" src="{{url('assets/backend/images/font-quicksand.svg')}}" alt="Dark Mode" />
                            </span>
                        </label>
                        <label class="m-1" for="font-nunito">
                            <input type="radio" name="font" id="font-nunito" value="font-nunito" checked="" />
                            <span class="card p-2">
                                <img class="img-fluid" src="{{url('assets/backend/images/font-nunito.svg')}}" alt="Dark Mode" />
                            </span>
                        </label>
                        <label class="m-1" for="font-raleway">
                            <input type="radio" name="font" id="font-raleway" value="font-raleway" />
                            <span class="card p-2">
                                <img class="img-fluid" src="{{url('assets/backend/images/font-raleway.svg')}}" alt="Dark Mode" />
                            </span>
                        </label>
                    </div>
                </div>
                <!-- start: Extra setting -->
                <div class="setting-more mb-4">
                    <h6 class="card-title">More Setting</h6>
                    <ul class="list-group list-group-flush list-group-custom fs-6">
                        <!-- Settings: Horizontal menu version -->
                        <li class="list-group-item">
                            <div class="form-check form-switch h-menu-switch mb-1">
                                <input class="form-check-input" type="checkbox" id="h_menu">
                                <label class="form-check-label" for="h_menu">Horizontal Menu Version</label>
                            </div>
                        </li>
                        <!-- Settings: page header top Fix -->
                        <li class="list-group-item">
                            <div class="form-check form-switch pageheader-switch mb-1">
                                <input class="form-check-input" type="checkbox" id="PageHeader" checked>
                                <label class="form-check-label" for="PageHeader">Page Header Fix</label>
                            </div>
                        </li>
                        <!-- Settings: page header Dark version  -->
                        <li class="list-group-item">
                            <div class="form-check form-switch pageheader-dark-switch mb-1">
                                <input class="form-check-input" type="checkbox" id="PageHeader_dark">
                                <label class="form-check-label" for="PageHeader_dark">Page Header Dark Mode</label>
                            </div>
                        </li>
                        <!-- Settings: Border radius -->
                        <li class="list-group-item">
                            <div class="form-check form-switch radius-switch mb-1">
                                <input class="form-check-input" type="checkbox" id="BorderRadius">
                                <label class="form-check-label" for="BorderRadius">Border Radius none</label>
                            </div>
                        </li>
                        <!-- Settings: sidebar dark -->
                        <li class="list-group-item">
                            <div class="form-check form-switch sidebardark-switch mb-1">
                                <input class="form-check-input" type="checkbox" id="SidebarDark">
                                <label class="form-check-label" for="SidebarDark">Enable Dark! ( Sidebar )</label>
                            </div>
                        </li>
                        <!-- Settings: Sidebar bg image -->
                        <li class="list-group-item">
                            <div class="setting-img">
                                <div class="form-check form-switch imagebg-switch mb-1">
                                    <input class="form-check-input" type="checkbox" id="CheckImage">
                                    <label class="form-check-label" for="CheckImage">Background Image (Sidebar)</label>
                                </div>
                                <div class="bg-images">
                                    <ul class="list-unstyled d-flex">
                                        <li class="sidebar-img-1 me-1 sidebar-img-active"><a class="rounded sidebar-img" id="img-1" href="#"><img src="assets/images/sidebar-bg/sidebar-1.jpg" alt="" /></a></li>
                                        <li class="sidebar-img-2 me-1"><a class="rounded sidebar-img" id="img-2" href="#"><img src="assets/images/sidebar-bg/sidebar-2.jpg" alt="" /></a></li>
                                        <li class="sidebar-img-3 me-1"><a class="rounded sidebar-img" id="img-3" href="#"><img src="assets/images/sidebar-bg/sidebar-3.jpg" alt="" /></a></li>
                                        <li class="sidebar-img-4 me-1"><a class="rounded sidebar-img" id="img-4" href="#"><img src="assets/images/sidebar-bg/sidebar-4.jpg" alt="" /></a></li>
                                        <li class="sidebar-img-5 me-1"><a class="rounded sidebar-img" id="img-5" href="#"><img src="assets/images/sidebar-bg/sidebar-5.jpg" alt="" /></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!-- Settings: Container Fluid -->
                        <li class="list-group-item">
                            <div class="form-check form-switch fluid-switch mb-1">
                                <input class="form-check-input" type="checkbox" id="fluidLayout" checked="">
                                <label class="form-check-label" for="fluidLayout">Container Fluid</label>
                            </div>
                        </li>
                        <!-- Settings: Card box shadow  -->
                        <li class="list-group-item">
                            <div class="form-check form-switch shadow-switch mb-1">
                                <input class="form-check-input" type="checkbox" id="card_shadow">
                                <label class="form-check-label" for="card_shadow">Card Box-Shadow</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="px-xl-4 modal-footer d-flex justify-content-start text-center">
                <button type="button" class="btn flex-fill btn-primary lift">Save Changes</button>
                <button type="button" class="btn flex-fill btn-white border lift" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{url('assets/backend/bundles/libscripts.bundle.js')}}"></script>

<!-- Plugin Js -->
<script src="{{url('assets/backend/bundles/apexcharts.bundle.js')}}"></script>
<script src="{{url('assets/backend/bundles/daterangepicker.bundle.js')}}"></script>
<script src="{{url('assets/backend/plugin/jvectormap/jquery-jvectormap-2.0.5.min.js')}}"></script>
<script src="{{url('assets/backend/plugin/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>

<!-- Jquery Page Js -->
<script>

// date range picker
$(function() {
$('input[name="daterange"]').daterangepicker({
    opens: 'left'
}, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
});
})

$(function() {
// top sparklines
var randomizeArray = function (arg) {
    var array = arg.slice();
    var currentIndex = array.length,
    temporaryValue,
    randomIndex;

    while (0 !== currentIndex) {
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
    }
    return array;
};
// data for the sparklines that appear below header area
var sparklineData = [47, 45, 54, 38, 56, 24, 65, 31, 54, 38, 56];

// topb big chart
var spark1 = {
    chart: {
        type: "area",
        height: 60,
        sparkline: {
            enabled: true,
        },
    },
    stroke: {
        width: 1,
    },
    series: [{
        data: randomizeArray(sparklineData),
    },],
    fill: {
        type: "gradient",
        gradient: {
            gradientToColors: ["var(--chart-color3)"],
            shadeIntensity: 2,
            opacityFrom: 0.7,
            opacityTo: 0.2,
            stops: [0, 100],
        },
    },
    colors: ["var(--chart-color3)"],
};
var spark1 = new ApexCharts(document.querySelector("#apexspark1"), spark1);
spark1.render();
var spark2 = {
    chart: {
        type: "area",
        height: 60,
        sparkline: {
            enabled: true,
        },
    },
    stroke: {
        width: 1,
    },
    series: [{
        data: randomizeArray(sparklineData),
    },],
    fill: {
        type: "gradient",
        gradient: {
            gradientToColors: ["var(--chart-color5)"],
            shadeIntensity: 2,
            opacityFrom: 0.7,
            opacityTo: 0.2,
            stops: [0, 100],
        },
    },
    colors: ["var(--chart-color5)"],
};
var spark2 = new ApexCharts(document.querySelector("#apexspark2"), spark2);
spark2.render();
var spark3 = {
    chart: {
        type: "area",
        height: 60,
        sparkline: {
            enabled: true,
        },
    },
    stroke: {
        width: 1,
    },
    series: [{
        data: randomizeArray(sparklineData),
    },],
    fill: {
        type: "gradient",
        gradient: {
            gradientToColors: ["var(--chart-color1)"],
            shadeIntensity: 2,
            opacityFrom: 0.7,
            opacityTo: 0.2,
            stops: [0, 100],
        },
    },
    colors: ["var(--chart-color1)"],
};
var spark3 = new ApexCharts(document.querySelector("#apexspark3"), spark3);
spark3.render();
var spark4 = {
    chart: {
        type: "area",
        height: 60,
        sparkline: {
            enabled: true,
        },
    },
    stroke: {
        width: 1,
    },
    series: [{
        data: randomizeArray(sparklineData),
    },],
    fill: {
        type: "gradient",
        gradient: {
            gradientToColors: ["var(--chart-color2)"],
            shadeIntensity: 2,
            opacityFrom: 0.7,
            opacityTo: 0.2,
            stops: [0, 100],
        },
    },
    colors: ["var(--chart-color2)"],
};
var spark4 = new ApexCharts(document.querySelector("#apexspark4"), spark4);
spark4.render();
})

// Top Selling Country
$(function () {
"use strict";
// Worldwide Analytics
$("#Top-Country").vectorMap({
    map: "world_mill",
    normalizeFunction: "polynomial",
    hoverOpacity: 0.2,
    hoverColor: false,
    backgroundColor: "var(--card-color)",
    regionStyle: {
        initial: {
            fill: "var(--color-400)",
            stroke: "var(--card-color)",
        },
    },
    markerStyle: {
        initial: {
            fill: "var(--primary-color)",
            stroke: "var(--card-color)",
        },
    },
    markers: [
        { latLng: [36.77, -119.41], name: "USA : 7.01%" },
        { latLng: [21.0, 78.0], name: "INDIA : 3.01%" },
        { latLng: [-33.0, 151.0], name: "Australia : 11k" },
        { latLng: [55.37, -3.41], name: "UK : 8.50%" },
        { latLng: [41.9, 12.45], name: "Vatican City : 1.2%" },
        { latLng: [1.3, 103.8], name: "Singapore : 2.8%" },
        { latLng: [26.02, 50.55], name: "Bahrain : 0.8%" },
    ],
    series: {
        regions: [{
            values: {
                US: "var(--chart-color2)",
                AU: "var(--chart-color3)",
                IN: "var(--chart-color4)",
                UK: "var(--chart-color5)",
            },
            attribute: "fill",
        },],
    },
});
});

// Product Report
$(document).ready(function () {
var options = {
chart: {
    height: 300,
    type: "area",
    stacked: true,
    toolbar: {
        show: false,
    },
    events: {
        selection: function (chart, e) {
            console.log(new Date(e.xaxis.min));
        },
    },
},

colors: ['var(--chart-color1)','var(--chart-color2)','var(--chart-color3)'],
dataLabels: {
    enabled: false,
},

series: [
    {
    name: "Mobile",
    data: generateDayWiseTimeSeries(
        new Date("11 Feb 2017 GMT").getTime(),
        20,
        {
        min: 10,
        max: 60,
        }
    ),
    },
    {
    name: "Laptop",
    data: generateDayWiseTimeSeries(
        new Date("11 Feb 2017 GMT").getTime(),
        20,
        {
        min: 10,
        max: 20,
        }
    ),
    },
    {
    name: "Tablet",
    data: generateDayWiseTimeSeries(
        new Date("11 Feb 2017 GMT").getTime(),
        20,
        {
        min: 10,
        max: 15,
        }
    ),
    },
],

fill: {
    type: "gradient",
    gradient: {
    opacityFrom: 0.6,
    opacityTo: 0.8,
    },
},

legend: {
    position: "top",
    horizontalAlign: "right",
    show: true,
},
xaxis: {
    type: "datetime",
},
grid: {
    yaxis: {
    lines: {
        show: false,
    },
    },
    padding: {
    top: 20,
    right: 0,
    bottom: 0,
    left: 0,
    },
},
stroke: {
    show: true,
    curve: "smooth",
    width: 2,
},
};

var chart = new ApexCharts(
document.querySelector("#apex-Product-Report"),
options
);
chart.render();
function generateDayWiseTimeSeries(baseval, count, yrange) {
var i = 0;
var series = [];
while (i < count) {
    var x = baseval;
    var y =
    Math.floor(Math.random() * (yrange.max - yrange.min + 1)) +
    yrange.min;

    series.push([x, y]);
    baseval += 86400000;
    i++;
}
return series;
}
});

</script>

</body>
</html>