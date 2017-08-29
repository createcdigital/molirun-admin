var AppPage = function(){
    // =========================================================================
    // SETTINGS APP
    // =========================================================================
    var map, geocoder;

    return {

        // =========================================================================
        // CONSTRUCTOR APP
        // =========================================================================
        init: function(){
            var url = window.location.href;


            if(url.indexOf("/racer/index") > 1)
            {
                AppPage.handleDatatable();
            }
            else if(url.indexOf("/racer/create") > 1)
            {
                AppPage.tagsConfig();
                AppPage.bindValidate();
                AppPage.bindCancelButton();
                AppPage.bindCheckboxEvent();
                AppPage.bindClickEvent();
            }
        },

        // =========================================================================
        // SET UP BASE URL
        // =========================================================================
        handleBaseURL: function () {
            var getUrl = window.location,
                baseUrl = getUrl .protocol + "//" + getUrl.host;
            return baseUrl;
        },

        // =========================================================================
        // DATATABLE INIT
        // =========================================================================
        handleDatatable: function () {
            // Updates "Select all" control in a data table
            function updateDataTableSelectAllCtrl(table){
                var $table             = table.table().node();
                var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
                var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
                var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);

                // If none of the checkboxes are checked
                if($chkbox_checked.length === 0){
                    chkbox_select_all.checked = false;
                    if('indeterminate' in chkbox_select_all){
                        chkbox_select_all.indeterminate = false;
                    }

                    // If all of the checkboxes are checked
                } else if ($chkbox_checked.length === $chkbox_all.length){
                    chkbox_select_all.checked = true;
                    if('indeterminate' in chkbox_select_all){
                        chkbox_select_all.indeterminate = false;
                    }

                    // If some of the checkboxes are checked
                } else {
                    chkbox_select_all.checked = true;
                    if('indeterminate' in chkbox_select_all){
                        chkbox_select_all.indeterminate = true;
                    }
                }
            }

            // Array holding selected row IDs
            var rows_selected = [];

            var responsiveHelper;
            var breakpointDefinition = {
                tablet: 1024,
                phone_landscape : 480,
                phone_portrait : 320
            };
            var tableID = $('#datatable-sample');
            var table = $('#datatable-sample').DataTable({
                // 'processing': true,
                // 'language': {
                //     'processing': "Hang on. Waiting for response..." //add a loading image,simply putting <img src="loader.gif" /> tag.
                // },
                'ajax': {
                    'url': '/racer/data'
                },
                'columnDefs': [
                    {
                        'targets': 0,
                        'data': 'id',
                        'name': 'id'
                    },
                    {
                        'targets': 1,
                        'data': 'grouptype',
                        'name': 'grouptype'
                    },
                    {
                        'targets': 2,
                        'data': 'p1_name',
                        'name': 'p1_name'
                    },
                    {
                        'targets': 3,
                        'data': 'p1_phone',
                        'name': 'p1_phone'
                    },
                    {
                        'targets': 4,
                        'data': 'p1_card_number',
                        'name': 'p1_card_number',
                        'render': function ( data, type, full, meta ) {
                            return '<div class="pull-left">' +
                                '<span>' + full.p1_card_number + '(' + full.p1_card_type + ')</span>' +
                                '</div>';
                        }
                    },
                    {
                        'targets': 5,
                        'data': 'p2_name',
                        'name': 'p2_name'
                    },
                    {
                        'targets': 6,
                        'data': 'p2_phone',
                        'name': 'p2_phone'
                    },
                    {
                        'targets': 7,
                        'data': 'p2_card_number',
                        'name': 'p2_card_number',
                        'render': function ( data, type, full, meta ) {
                            if(full.p2_card_number && full.p2_card_type) {
                                return '<div class="pull-left">' +
                                    '<span>' + full.p2_card_number + '(' + full.p2_card_type + ')</span>' +
                                    '</div>';
                            }else
                                return '';
                        }
                    },
                    {
                        'targets': 8,
                        'data': 'kids_name',
                        'name': 'kids_name'
                    },
                    {
                        'targets': 9,
                        'data': 'kids_card_number',
                        'name': 'kids_card_number',
                        'render': function ( data, type, full, meta ) {
                            if(full.kids_card_number && full.kids_card_type) {
                                return '<div class="pull-left">' +
                                    '<span>' + full.kids_card_number + '(' + full.kids_card_type + ')</span>' +
                                    '</div>';
                            }else
                                return '';
                        }
                    },
                    {
                        'targets': 10,
                        'data': 'kids_guardian_phone',
                        'name': 'kids_guardian_phone'
                    },
                    {
                        'targets': 11,
                        'data': 'pakcage_get_way',
                        'name': 'pakcage_get_way'
                    },
                    {
                        'targets': 12,
                        'data': 'pay_status',
                        'name': 'pay_status'
                    },
                    {
                        'targets': 13,
                        'data': 'created_at',
                        'name': 'created_at'
                    },
                    {
                        "orderable": false,
                        'targets': 14,
                        'class': 'text-center',
                        'render': function ( data, type, full, meta ) {
                            return '<div class="btn-group">' +
                                '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                                '<i class="fa fa-cogs"></i>' +
                                '</button>' +
                                '<ul class="dropdown-menu pull-right">' +
                                '<li>' +
                                '<a href="#" class="btn-view">查看</a>' +
                                '</li>' +
                                '<li><a href="#" class="btn-edit">编辑</a></li>' +
                                '<li role="separator" class="divider"></li>' +
                                '<li><a href="#" class="btn-delete">删除</a></li>' +
                                '</ul>' +
                                '</div>'
                        }
                    }
                ],
                'order': [[0, 'asc']],
                'autoWidth' : false,
                'iDisplayLength': 10,
                'select': true,
                'preDrawCallback': function () {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper) {
                        responsiveHelper = new ResponsiveDatatablesHelper(tableID, breakpointDefinition);
                    }
                },
                'rowCallback' : function (nRow, row, data, dataIndex) {
                    // Get row ID
                    var rowId = data[0];

                    // If row ID is in the list of selected row IDs
                    if($.inArray(rowId, rows_selected) !== -1){
                        $(row).find('input[type="checkbox"]').prop('checked', true);
                        $(row).addClass('selected');
                    }

                    responsiveHelper.createExpandIcon(nRow);
                },
                'drawCallback' : function(oSettings) {
                    responsiveHelper.respond();
                    // call dropdown bootstrap
                    $('body .dropdown-toggle').dropdown();

                    if(oSettings.iDraw == 2)
                    {
                        // call actions on last column datatable
                        AppPage.handleActionViewDatatable();
                        AppPage.handleActionEditDatatable();
                        AppPage.handleActionDeleteDatatable();
                    }
                }
            });

            // Toggle column
            $('a.toggle-column').on( 'click', function (e) {
                e.preventDefault();

                // Change state
                $(this).parents('li').toggleClass('selected');

                // Get the column API object
                var column = table.column( $(this).attr('data-column') );

                // Toggle the visibility
                column.visible( ! column.visible() );

                // Call notifications
                AppPage.handleNotificationDatatable($(this).text()+' Column');

            } );

            // Handle click on checkbox
            $('#datatable-sample tbody').on('click', '.ckbox, input[type="checkbox"]', function(e){
                var $row = $(this).closest('tr');

                // Get row data
                var data = table.row($row).data();

                // Get row ID
                var rowId = data[0];

                // Determine whether row ID is in the list of selected row IDs
                var index = $.inArray(rowId, rows_selected);

                // If checkbox is checked and row ID is not in list of selected row IDs
                if(this.checked && index === -1){
                    rows_selected.push(rowId);

                    // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
                } else if (!this.checked && index !== -1){
                    rows_selected.splice(index, 1);
                }

                if(this.checked){
                    $row.addClass('selected');
                } else {
                    $row.removeClass('selected');
                }

                // Update state of "Select all" control
                //updateDataTableSelectAllCtrl(table);

                // Prevent click event from propagating to parent
                e.stopPropagation();
            });

            // Handle click on table cells with checkboxes
            $('#datatable-sample').on('click', 'tbody td', function(e){
                if($(this).is(':last-child')){
                    return false;
                }else{
                    $(this).parent().find('input[type="checkbox"]').trigger('click');
                }
            });

            // Handle click on "Select all" control
            $('#datatable-sample thead input[name="select_all"]').on('click', function(e){
                if(this.checked){
                    $('#datatable-sample tbody input[type="checkbox"]:not(:checked)').trigger('click');
                } else {
                    $('#datatable-sample tbody input[type="checkbox"]:checked').trigger('click');
                }

                // Prevent click event from propagating to parent
                e.stopPropagation();
            });

            // Handle table draw event
            table.on('draw', function(){
                // Update state of "Select all" control
                //updateDataTableSelectAllCtrl(table);
            });

            // Handle form submission event
            $('#frm-example').on('submit', function(e){
                var form = this;

                // Iterate over all selected checkboxes
                $.each(rows_selected, function(index, rowId){
                    // Create a hidden element
                    $(form).append(
                        $('<input>')
                            .attr('type', 'hidden')
                            .attr('name', 'id[]')
                            .val(rowId)
                    );
                });

                // FOR DEMONSTRATION ONLY

                // Output form data to a console
                $('#example-console').text($(form).serialize());
                console.log("Form submission", $(form).serialize());

                // Remove added elements
                $('input[name="id\[\]"]', form).remove();

                // Prevent actual form submission
                e.preventDefault();
            });
        },

        // =========================================================================
        // ACTION VIEW ROW DATATABLES
        // =========================================================================
        handleActionViewDatatable: function () {
            $('#datatable-sample').on('click', '.btn-view', function(){
                showModalDialog(this);
            });

            $('#modal-view-datatable').modal({ show: false });

            $('#modal-view-datatable').on('show.bs.modal', function (e){
                var $dlg = $(this);

                var $tr    = $($dlg.data('btn')).closest('tr');
                var $table = $($dlg.data('btn')).closest('table');
                var data = $table.DataTable().row($tr).data();

                var transactionName="商户订单号";
                if(data.pay_status=='邀请码支付')
                {
                    transactionName= "邀请码";
                }
                // family html
                var family_html = '' +
                    // 成年人2
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">成人2姓名 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.p2_name).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">成人2性别 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.p2_sex).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">成人2出生年月 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.p2_birthday).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">成人2T恤尺码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.p2_teesize).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">成人2证件类型 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.p2_card_type).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">成人2证件号码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.p2_card_number).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">成人2手机号码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.p2_phone).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">成人2紧急联系人 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.p2_emergency_name).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">成人2紧急联系人手机号码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.p2_emergency_phone).html() + '</p>'+
                    '</div>' +
                    '</div>' +

                    // 未成年人
                    '<div class="form-group form-bordered">' +
                    '<label class="col-sm-4 control-label">未成年人姓名 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.kids_name).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">未成年人性别 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.kids_sex).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">未成年人出生年月 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.kids_birthday).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">未成年人T恤尺码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.kids_teesize).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">未成年人证件类型 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.kids_card_type).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">未成年人证件号码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.kids_card_number).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">未成年人法定监护人姓名 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.kids_guardian_name).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">未成年人法定监护人手机号码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.kids_guardian_phone).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">未成年人紧急联系人 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.kids_emergency_name).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">未成年人紧急联系人手机号码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.kids_emergency_phone).html() + '</p>'+
                    '</div>' +
                    '</div>';






                var html = '<form class="form-horizontal">' +

                    '<div class="form-group form-group-divider">' +
                    '<div class="form-inner">' +
                    '<h4 class="no-margin">微信用户信息</h4>' +
                    '</div>' +
                    '</div>' +

                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">微信openid :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.openid).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">微信头像 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static"><img src="' + data.headimgurl + '" width="100px" alt=""></p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">微信昵称 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.nickname).html() + '</p>'+
                    '</div>' +
                    '</div>' +

                    '<div class="form-group form-group-divider">' +
                    '<div class="form-inner">' +
                    '<h4 class="no-margin">报名信息</h4>' +
                    '</div>' +
                    '</div>' +


                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">报名序号 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.id).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">报名时间 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.created_at).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">参赛组 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.grouptype).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">标签 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.p1_tag).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">赛事包领取方式 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.pakcage_get_way).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">收货人 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.pakcage_get_name).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">收货人电话 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.pakcage_get_phone).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">收货地址 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.pakcage_get_address).html() + '</p>'+
                    '</div>' +
                    '</div>' +


                    '<div class="form-group form-group-divider">' +
                    '<div class="form-inner">' +
                    '<h4 class="no-margin">参赛人信息</h4>' +
                    '</div>' +
                    '</div>' +

                    // 成人1
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">姓名 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.p1_name).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">性别 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.p1_sex).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">出生年月 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.p1_birthday).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">T恤尺码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.p1_teesize).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">证件类型 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.p1_card_type).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">证件号码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.p1_card_number).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">手机号码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.p1_phone).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">紧急联系人 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.p1_emergency_name).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-4 control-label">紧急联系人手机号码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.p1_emergency_phone).html() + '</p>'+
                    '</div>' +
                    '</div>' +

                    // family
                    (data.grouptype == "亲子跑" ? family_html : '') +


                    '<div class="form-group form-group-divider">' +
                    '<div class="form-inner">' +
                    '<h4 class="no-margin">支付信息</h4>' +
                    '</div>' +
                    '</div>' +

                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">支付状态 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.pay_status).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">'+transactionName+':</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.transaction_id).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">交易时间 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.transaction_date).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '</form>';

                $('.row-name', $dlg).html(data.p1_name);

                $('.modal-body', $dlg).html(html);
            });

            function showModalDialog(elBtn){
                $('#modal-view-datatable').data('btn', elBtn);
                $('#modal-view-datatable').modal('show');
            }
        },

        // =========================================================================
        // ACTION EDIT ROW DATATABLES
        // =========================================================================
        handleActionEditDatatable: function () {
            var _table, _data;

            $('#datatable-sample').on('click', '.btn-edit', function(){
                showModalDialog(this);
            });

            $('#modal-edit-datatable').modal({ show: false });

            $('#modal-edit-datatable').on('show.bs.modal', function (e){
                var $dlg = $(this);

                var $tr    = $($dlg.data('btn')).closest('tr');
                var $table = $($dlg.data('btn')).closest('table');
                var data = $table.DataTable().row($tr).data();

                var transactionName="商户订单号";
                if(data.pay_status=='邀请码支付')
                {
                    transactionName= "邀请码";
                }

                //参赛组
                var groupHTML = "";
                var groupValue = "";
                if(data.grouptype=="5公里")
                {
                    groupValue = "5公里";
                    groupHTML= '<div class="col-md-2">' +
                    '<div class="rdio rdio-theme circle">' +
                    '<input id="radio-type-default2" checked="checked" type="radio" value="5公里" name="radio_grouptype">' +
                    '<label for="radio-type-default2">5公里</label>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                    '<div class="rdio rdio-theme circle">' +
                    '<input id="radio-type-rounded2" type="radio" value="10公里" name="radio_grouptype">' +
                    '<label for="radio-type-rounded2">10公里</label>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                    '<div class="rdio rdio-theme circle">' +
                    '<input id="radio-type-circle2" type="radio" value="亲子跑" name="radio_grouptype">' +
                    '<label for="radio-type-circle2">亲子跑</label>' +
                    '</div>' +
                    '</div>' ;
                }else if (data.grouptype=="10公里")
                {
                    groupValue = "10公里";
                    groupHTML= '<div class="col-md-2">' +
                    '<div class="rdio rdio-theme circle">' +
                    '<input id="radio-type-default2"  type="radio" value="5公里" name="radio_grouptype">' +
                    '<label for="radio-type-default2">5公里</label>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                    '<div class="rdio rdio-theme circle">' +
                    '<input id="radio-type-rounded2" checked="checked" type="radio" value="10公里" name="radio_grouptype">' +
                    '<label for="radio-type-rounded2">10公里</label>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                    '<div class="rdio rdio-theme circle">' +
                    '<input id="radio-type-circle2" type="radio" value="亲子跑" name="radio_grouptype">' +
                    '<label for="radio-type-circle2">亲子跑</label>' +
                    '</div>' +
                    '</div>' ;
                }else
                {
                    groupValue = "亲子跑";
                    groupHTML= '<div class="col-md-2">' +
                    '<div class="rdio rdio-theme circle">' +
                    '<input id="radio-type-default2"  type="radio" value="5公里" name="radio_grouptype">' +
                    '<label for="radio-type-default2">5公里</label>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                    '<div class="rdio rdio-theme circle">' +
                    '<input id="radio-type-rounded2" type="radio" value="10公里" name="radio_grouptype">' +
                    '<label for="radio-type-rounded2">10公里</label>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                    '<div class="rdio rdio-theme circle">' +
                    '<input id="radio-type-circle2" checked="checked" type="radio" value="亲子跑" name="radio_grouptype">' +
                    '<label for="radio-type-circle2">亲子跑</label>' +
                    '</div>' +
                    '</div>' ;
                }

                //领取方式
                var pakcagegetway ="",pakcagegetwayHTML="";
                if(data.pakcage_get_way=="顺丰到付")
                {
                    pakcagegetway = "顺丰到付"
                    pakcagegetwayHTML ='<div class="rdio rdio-theme circle">' +
                    '<input id="radio_pakcage_get_way_delivery" checked="checked" type="radio" value="顺丰到付" name="radio_pakcage_get_way">' +
                    '<label for="radio_pakcage_get_way_delivery">顺丰到付</label>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-sm-4">' +
                    '<div class="rdio rdio-theme circle">' +
                    '<input id="radio_pakcage_get_way_onsite" type="radio" value="现场领取" name="radio_pakcage_get_way">' +
                    '<label for="radio_pakcage_get_way_onsite">现场领取</label>' +
                    '</div>';
                }else
                {
                    pakcagegetway = "现场领取"
                    pakcagegetwayHTML ='<div class="rdio rdio-theme circle">' +
                    '<input id="radio_pakcage_get_way_delivery"  type="radio" value="顺丰到付" name="radio_pakcage_get_way">' +
                    '<label for="radio_pakcage_get_way_delivery">顺丰到付</label>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-sm-4">' +
                    '<div class="rdio rdio-theme circle">' +
                    '<input id="radio_pakcage_get_way_onsite" checked="checked" type="radio" value="现场领取" name="radio_pakcage_get_way">' +
                    '<label for="radio_pakcage_get_way_onsite">现场领取</label>' +
                    '</div>' ;
                }

                //成人1性别
                var p1sex ="",p1sexHTML="";
                if(data.p1_sex=="男")
                {
                    p1sex = "男";
                    p1sexHTML='<div class="rdio rdio-theme circle">' +
                    '<input id="radio_p1_sex_male" checked="checked" type="radio" value="男" name="radio_p1_sex">' +
                    '<label for="radio_p1_sex_male">男</label>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-sm-4">' +
                    '<div class="rdio rdio-theme circle">' +
                    '<input id="radio_p1_sex_female" type="radio" value="女" name="radio_p1_sex">' +
                    '<label for="radio_p1_sex_female">女</label>' +
                    '</div>'
                }else
                {
                    p1sex = "女";
                    p1sexHTML='<div class="rdio rdio-theme circle">' +
                    '<input id="radio_p1_sex_male"  type="radio" value="男" name="radio_p1_sex">' +
                    '<label for="radio_p1_sex_male">男</label>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-sm-4">' +
                    '<div class="rdio rdio-theme circle">' +
                    '<input id="radio_p1_sex_female" checked="checked" type="radio" value="女" name="radio_p1_sex">' +
                    '<label for="radio_p1_sex_female">女</label>' +
                    '</div>'
                }
                //成人2性别
                var p2sex ="",p2sexHTML="";
                if(data.p2_sex=="男")
                {
                    p2sex = "男";
                    p2sexHTML='<div class="rdio rdio-theme circle">' +
                        '<input id="radio_p2_sex_male" checked="checked" type="radio" value="男" name="radio_p2_sex">' +
                        '<label for="radio_p2_sex_male">男</label>' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-sm-4">' +
                        '<div class="rdio rdio-theme circle">' +
                        '<input id="radio_p2_sex_female" type="radio" value="女" name="radio_p2_sex">' +
                        '<label for="radio_p2_sex_female">女</label>' +
                        '</div>'
                }else
                {
                    p2sex = "女";
                    p2sexHTML='<div class="rdio rdio-theme circle">' +
                        '<input id="radio_p2_sex_male"  type="radio" value="男" name="radio_p2_sex">' +
                        '<label for="radio_p2_sex_male">男</label>' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-sm-4">' +
                        '<div class="rdio rdio-theme circle">' +
                        '<input id="radio_p2_sex_female" checked="checked" type="radio" value="女" name="radio_p2_sex">' +
                        '<label for="radio_p2_sex_female">女</label>' +
                        '</div>'
                }

                //儿童性别
                var kidssex ="",kidssexHTML="";
                if(data.kids_sex=="男")
                {
                    kidssex = "男";
                    kidssexHTML='<div class="col-sm-4">' +
                    '<div class="rdio rdio-theme circle">' +
                    '<input id="radio_kids_sex_male" checked="checked" type="radio" value="男" name="radio_kids_sex">' +
                    '<label for="radio_kids_sex_male">男</label>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-sm-4">' +
                    '<div class="rdio rdio-theme circle">' +
                    '<input id="radio_kids_sex_female" type="radio" value="女" name="radio_kids_sex">' +
                    '<label for="radio_kids_sex_female">女</label>' +
                    '</div>';
                }else
                {
                    kidssex = "女";
                    kidssexHTML='<div class="col-sm-4">' +
                        '<div class="rdio rdio-theme circle">' +
                        '<input id="radio_kids_sex_male"  type="radio" value="男" name="radio_kids_sex">' +
                        '<label for="radio_kids_sex_male">男</label>' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-sm-4">' +
                        '<div class="rdio rdio-theme circle">' +
                        '<input id="radio_kids_sex_female" checked="checked" type="radio" value="女" name="radio_kids_sex">' +
                        '<label for="radio_kids_sex_female">女</label>' +
                        '</div>';
                }
                // family html
                var family_html = '' +
                    // 成年人2
                    '<div class="form-p2">'+
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">成人2姓名 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.p2_name + '" name="p2_name">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">成人2性别 :</label>' +
                    '<div class="col-sm-4">' +
                    p2sexHTML+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">成人2出生年月 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.p2_birthday + '" name="p2_birthday" id="p2_birthday">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">成人2T恤尺码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<select class="form-control" name="p2_teesize">' +
                    '<option '+(data.p2_teesize == "XS(160/82A)" ? 'selected="selected"' : '')+' value="XS(160/82A)">XS(160/82A)</option>' +
                    '<option '+(data.p2_teesize == "S(165/84A)" ? 'selected="selected"' : '')+' value="S(165/84A)">S(165/84A)</option>' +
                    '<option '+(data.p2_teesize == "M(170/88A)" ? 'selected="selected"' : '')+' value="M(170/88A)">M(170/88A)</option>' +
                    '<option '+(data.p2_teesize == "L(175/92A)" ? 'selected="selected"' : '')+' value="L(175/92A)">L(175/92A)</option>' +
                    '<option '+(data.p2_teesize == "XL(180/96A)" ? 'selected="selected"' : '')+' value="XL(180/96A)">XL(180/96A)</option>' +
                    '<option '+(data.p2_teesize == "XXL(185/100A)" ? 'selected="selected"' : '')+'value="XXL(185/100A)">XXL(185/100A)</option>' +
                    '</select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">成人2证件类型 :</label>' +
                    '<div class="col-sm-8">' +
                    '<select class="form-control" name="p2_card_type">' +
                    '<option '+(data.p2_card_type == "身份证" ? 'selected="selected"' : '')+ 'value="身份证">身份证</option>' +
                    '<option '+(data.p2_card_type == "护照" ? 'selected="selected"' : '')+ 'value="护照">护照</option>' +
                    '<option '+(data.p2_card_type == "港澳居民来往内地通行证" ? 'selected="selected"' : '')+ ' value="港澳居民来往内地通行证">港澳居民来往内地通行证</option>' +
                    '<option '+(data.p2_card_type == "台湾居民来往大陆通行证" ? 'selected="selected"' : '')+ ' value="台湾居民来往大陆通行证">台湾居民来往大陆通行证</option>' +
                    '</select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">成人2证件号码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.p2_card_number + '" name="p2_card_number">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">成人2手机号码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.p2_phone + '" name="p2_phone">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">成人2紧急联系人 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.p2_emergency_name + '" name="p2_emergency_name">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">成人2紧急联系人手机号码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.p2_emergency_phone + '" name="p2_emergency_phone">' +
                    '</div>' +
                    '</div>' +
                    '</div>' +

                    // 未成年人
                    '<div class="form-kids">'+
                    '<div class="form-group form-bordered">' +
                    '<label class="col-sm-3 control-label">未成年人姓名 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.kids_name + '" name="kids_name">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">未成年人性别 :</label>' +
                    kidssexHTML+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">未成年人出生年月 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.kids_birthday + '" name="kids_birthday" id="kids_birthday">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">未成年人T恤尺码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<select class="form-control" name="kids_teesize">' +
                    '<option '+(data.kids_teesize == "110以下" ? 'selected="selected"' : '')+ ' value="110以下">110以下</option>' +
                    '<option '+(data.kids_teesize == "110-130" ? 'selected="selected"' : '')+ '  value="110-130">110-130</option>' +
                    '<option '+(data.kids_teesize == "XS(160/82A)" ? 'selected="selected"' : '')+ '  value="XS(160/82A)">XS(160/82A)</option>' +
                    '<option '+(data.kids_teesize == "S(165/84A)" ? 'selected="selected"' : '')+ '  value="S(165/84A)">S(165/84A)</option>' +
                    '<option '+(data.kids_teesize == "M(170/88A)" ? 'selected="selected"' : '')+ '  value="M(170/88A)">M(170/88A)</option>' +
                    '<option '+(data.kids_teesize == "L(175/92A)" ? 'selected="selected"' : '')+ '  value="L(175/92A)">L(175/92A)</option>' +
                    '<option '+(data.kids_teesize == "XL(180/96A)" ? 'selected="selected"' : '')+ '  value="XL(180/96A)">XL(180/96A)</option>' +
                    '<option '+(data.kids_teesize == "XXL(185/100A)" ? 'selected="selected"' : '')+ '  value="XXL(185/100A)">XXL(185/100A)</option>' +
                    '</select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">未成年人证件类型 :</label>' +
                    '<div class="col-sm-8">' +
                    '<select class="form-control" name="kids_card_type">' +
                    '<option '+(data.kids_card_type == "身份证" ? 'selected="selected"' : '')+ 'value="身份证">身份证</option>' +
                    '<option '+(data.kids_card_type == "护照" ? 'selected="selected"' : '')+ 'value="护照">护照</option>' +
                    '<option '+(data.kids_card_type == "港澳居民来往内地通行证" ? 'selected="selected"' : '')+ ' value="港澳居民来往内地通行证">港澳居民来往内地通行证</option>' +
                    '<option '+(data.kids_card_type == "台湾居民来往大陆通行证" ? 'selected="selected"' : '')+ ' value="台湾居民来往大陆通行证">台湾居民来往大陆通行证</option>' +
                    '</select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">未成年人证件号码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.kids_card_number + '" name="kids_card_number">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">未成年人法定监护人姓名 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.kids_guardian_name + '" name="kids_guardian_name">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">未成年人法定监护人手机号码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.kids_guardian_phone + '" name="kids_guardian_phone">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">未成年人紧急联系人 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.kids_emergency_name + '" name="kids_emergency_name">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">未成年人紧急联系人手机号码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.kids_emergency_phone + '" name="kids_emergency_phone">' +
                    '</div>' +
                    '</div>';
                    '</div>';

                var html = '<form class="form-horizontal" id="form-edit">' +
                    '<input type="hidden" id="grouptype" name="grouptype" value="'+groupValue+'">' +
                    '<input type="hidden" name="pakcage_get_way" value="'+pakcagegetway+'">' +
                    '<input type="hidden" name="p1_sex" value="'+p1sex+'">' +
                    '<input type="hidden" name="p2_sex" value="'+p2sex+'">' +
                    '<input type="hidden" name="kids_sex" value="'+kidssex+'">' +
                    '' +
                    '<div class="form-group form-group-divider">' +
                    '<div class="form-inner">' +
                    '<h4 class="no-margin">微信用户信息</h4>' +
                    '</div>' +
                    '</div>' +

                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">微信openid :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.openid).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">微信头像 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static"><img src="' + data.headimgurl + '" width="100px" alt=""></p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">微信昵称 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.nickname).html() + '</p>'+
                    '</div>' +
                    '</div>' +

                    '<div class="form-group form-group-divider">' +
                    '<div class="form-inner">' +
                    '<h4 class="no-margin">报名信息</h4>' +
                    '</div>' +
                    '</div>' +



                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">报名序号 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.id).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">报名时间 :</label>' +
                    '<div class="col-sm-8">' +
                    '<p class="form-control-static">' + $('<div/>').text(data.created_at).html() + '</p>'+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">参赛组 :</label>' +
                     groupHTML+
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">标签</label>' +
                    '<div class="col-sm-8">' +
                    '<select class="form-control"   id="p1_tag" name="p1_tag">' +
                    '<option '+(data.p1_tag == "棒棒哒" ? 'selected="selected"' : '')+' value="棒棒哒">棒棒哒</option>' +
                    '<option '+(data.p1_tag == "萌萌哒" ? 'selected="selected"' : '')+'value="重口味">萌萌哒</option>' +
                    '<option '+(data.p1_tag == "美美哒" ? 'selected="selected"' : '')+'value="美美哒">美美哒</option>' +
                    '<option '+(data.p1_tag == "小清新" ? 'selected="selected"' : '')+' value="小清新">小清新</option>' +
                    '<option '+(data.p1_tag == "重口味" ? 'selected="selected"' : '')+'value="重口味">重口味</option>' +
                    '<option '+(data.p1_tag == "天然萌" ? 'selected="selected"' : '')+'value="天然萌">天然萌</option>' +
                    '<option '+(data.p1_tag == "自然呆" ? 'selected="selected"' : '')+'value="自然呆">自然呆</option>' +
                    '<option '+(data.p1_tag == "纯爷们" ? 'selected="selected"' : '')+'value="纯爷们">纯爷们</option>' +
                    '<option '+(data.p1_tag == "万人迷" ? 'selected="selected"' : '')+'value="万人迷">万人迷</option>' +
                    '<option '+(data.p1_tag == "女神经" ? 'selected="selected"' : '')+'value="女神经">女神经</option>' +
                    '<option '+(data.p1_tag == "男神经" ? 'selected="selected"' : '')+'value="男神经">男神经</option>' +
                    '</select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">赛事包领取方式 :</label>' +
                    '<div class="col-sm-4">' +
                    pakcagegetwayHTML+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">收货人 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.pakcage_get_name + '" name="pakcage_get_name">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">收货人电话 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.pakcage_get_phone + '" name="pakcage_get_phone">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">收货地址 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.pakcage_get_address + '" name="pakcage_get_address">' +
                    '</div>' +
                    '</div>' +




                    '<div class="form-group form-group-divider">' +
                    '<div class="form-inner">' +
                    '<h4 class="no-margin">参赛人信息</h4>' +
                    '</div>' +
                    '</div><br/>' +

                    // 成人1
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">姓名 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.p1_name + '" name="p1_name">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">性别 : </label>' +
                    '<div class="col-sm-4">' +
                    p1sexHTML+
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">出生年月 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.p1_birthday + '" name="p1_birthday" id="p1_birthday">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">T恤尺码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<select class="form-control" name="p1_teesize">' +
                    '<option '+(data.p1_teesize == "XS(160/82A)" ? 'selected="selected"' : '')+' value="XS(160/82A)">XS(160/82A)</option>' +
                    '<option '+(data.p1_teesize == "S(165/84A)" ? 'selected="selected"' : '')+' value="S(165/84A)">S(165/84A)</option>' +
                    '<option '+(data.p1_teesize == "M(170/88A)" ? 'selected="selected"' : '')+' value="M(170/88A)">M(170/88A)</option>' +
                    '<option '+(data.p1_teesize == "L(175/92A)" ? 'selected="selected"' : '')+' value="L(175/92A)">L(175/92A)</option>' +
                    '<option '+(data.p1_teesize == "XL(180/96A)" ? 'selected="selected"' : '')+' value="XL(180/96A)">XL(180/96A)</option>' +
                    '<option '+(data.p1_teesize == "XXL(185/100A)" ? 'selected="selected"' : '')+'value="XXL(185/100A)">XXL(185/100A)</option>' +
                    '</select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">证件类型 :</label>' +
                    '<div class="col-sm-8">' +
                    '<select class="form-control" name="p1_card_type">' +
                    '<option '+(data.p1_card_type == "身份证" ? 'selected="selected"' : '')+ 'value="身份证">身份证</option>' +
                    '<option '+(data.p1_card_type == "护照" ? 'selected="selected"' : '')+ 'value="护照">护照</option>' +
                    '<option '+(data.p1_card_type == "港澳居民来往内地通行证" ? 'selected="selected"' : '')+ ' value="港澳居民来往内地通行证">港澳居民来往内地通行证</option>' +
                    '<option '+(data.p1_card_type == "台湾居民来往大陆通行证" ? 'selected="selected"' : '')+ ' value="台湾居民来往大陆通行证">台湾居民来往大陆通行证</option>' +
                    '</select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">证件号码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.p1_card_number + '" name="p1_card_number">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">手机号码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.p1_phone + '" name="p1_phone">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">紧急联系人 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.p1_emergency_name + '" name="p1_emergency_name">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">紧急联系人手机号码 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + data.p1_emergency_phone + '" name="p1_emergency_phone">' +
                    '</div>' +
                    '</div>' +

                    // family
                    (data.grouptype == "亲子跑" ? family_html : '') +


                    '<div class="form-group form-group-divider">' +
                    '<div class="form-inner">' +
                    '<h4 class="no-margin">支付信息</h4>' +
                    '</div>' +
                    '</div>' +

                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">支付状态 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + $('<div/>').text(data.pay_status).html() + '" name="pay_status">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">'+transactionName+' :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' + $('<div/>').text(data.transaction_id).html() + '" name="transaction_id">' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label class="col-sm-3 control-label">交易时间 :</label>' +
                    '<div class="col-sm-8">' +
                    '<input class="form-control" type="text" value="' +  $('<div/>').text(data.transaction_date).html() + '" name="transaction_date">' +
                    '</div>' +
                    '</div>' +
                '</form>';

                $('.row-name', $dlg).html(data.name);

                $('.modal-body', $dlg).html(html);

                _table = $table.DataTable();
                _data = data;

                validate();
                AppPage.tagsConfig();
                AppPage.bindCheckboxEvent();
            });

            function showModalDialog(elBtn){
                $('#modal-edit-datatable').data('btn', elBtn);
                $('#modal-edit-datatable').modal('show');
            }


            function validate() {
                $("#form-edit").validate({
                    rules:{
                        city_location:{
                            required:true
                        },
                        name:{
                            required:true
                        },
                        //store_logo:{
                        //     required:true
                        // },
                        introduction:{
                            required:true
                        },
                        //photo_list_1:{
                        //     required:true
                        // },
                        open_time:{
                            required:true
                        },
                        service_phone:{
                            required:true
                        },
                        address:{
                            required:true
                        },
                        payment_support:{
                            required:true
                        },
                    },
                    messages: {

                    },
                    highlight:function(element) {
                        $(element).parents('.form-group').addClass('has-error has-feedback');
                    },
                    unhighlight: function(element) {
                        $(element).parents('.form-group').removeClass('has-error');
                    },
                    submitHandler: function(form) {
                        submitEdit();
                    }
                });
            }

            $('#modal-edit-datatable').on('click', '.btn-edit-confirm', function(){
                $("#form-edit").submit();
            });

            function submitEdit() {
                var data = {'id': _data.id};

                if(_data.grouptype !== $('#grouptype').val())
                    data.grouptype = $('#grouptype').val();

                if(_data.p1_tag !== $('#p1_tag').val())
                    data.p1_tag = $('#p1_tag').val();

                if(_data.p1_name !== $('input[name="p1_name"]').val())
                    data.p1_name = $('input[name="p1_name"]').val();

                if(_data.p1_sex !== $('input[name=p1_sex]').val())
                    data.p1_sex = $('input[name=p1_sex]').val();

                if(_data.p1_birthday !== $("input[name='p1_birthday']").val())
                    data.p1_birthday = $("input[name='p1_birthday']").val();

                if(_data.p1_teesize !== $('select[name="p1_teesize"]').val())
                    data.p1_teesize = $('select[name="p1_teesize"]').val();

                if(_data.p1_card_type !== $('select[name="p1_card_type"]').val())
                    data.p1_card_type = $('select[name="p1_card_type"]').val();

                if(_data.p1_card_number !== $('input[name="p1_card_number"]').val())
                    data.p1_card_number = $('input[name="p1_card_number"]').val();

                if(_data.p1_phone !== $('input[name="p1_phone"]').val())
                    data.p1_phone = $('input[name="p1_phone"]').val();

                if(_data.p1_emergency_name !== $('input[name="p1_emergency_name"]').val())
                    data.p1_emergency_name = $('input[name="p1_emergency_name"]').val();

                if(_data.p1_emergency_phone !== $('input[name="p1_emergency_phone"]').val())
                    data.p1_emergency_phone = $('input[name="p1_emergency_phone"]').val();

                //p2
                if(_data.p2_name !== $('input[name="p2_name"]').val())
                    data.p2_name = $('input[name="p2_name"]').val();

                if(_data.p2_sex !== $('input[name=p2_sex]').val())
                    data.p2_sex = $('input[name=p2_sex]').val();

                if(_data.p2_birthday !== $("input[name='p2_birthday']").val())
                    data.p2_birthday = $("input[name='p2_birthday']").val();

                if(_data.p2_teesize !== $('select[name="p2_teesize"]').val())
                    data.p2_teesize = $('select[name="p2_teesize"]').val();

                if(_data.p2_card_type !== $('select[name="p2_card_type"]').val())
                    data.p2_card_type = $('select[name="p2_card_type"]').val();

                if(_data.p2_card_number !== $('input[name="p2_card_number"]').val())
                    data.p2_card_number = $('input[name="p2_card_number"]').val();

                if(_data.p2_phone !== $('input[name="p2_phone"]').val())
                    data.p2_phone = $('input[name="p2_phone"]').val();

                if(_data.p2_emergency_name !== $('input[name="p2_emergency_name"]').val())
                    data.p2_emergency_name = $('input[name="p2_emergency_name"]').val();

                if(_data.p2_emergency_phone !== $('input[name="p2_emergency_phone"]').val())
                    data.p2_emergency_phone = $('input[name="p2_emergency_phone"]').val();

                //kids
                if(_data.kids_name !== $('input[name="kids_name"]').val())
                    data.kids_name = $('input[name="kids_name"]').val();

                if(_data.kids_sex !== $('input[name=kids_sex]').val())
                    data.kids_sex = $('input[name=kids_sex]').val();

                if(_data.kids_birthday !== $("input[name='kids_birthday']").val())
                    data.kids_birthday = $("input[name='kids_birthday']").val();

                if(_data.kids_teesize !== $('select[name="kids_teesize"]').val())
                    data.kids_teesize = $('select[name="kids_teesize"]').val();

                if(_data.kids_card_type !== $('select[name="kids_card_type"]').val())
                    data.kids_card_type = $('select[name="kids_card_type"]').val();

                if(_data.kids_card_number !== $('input[name="kids_card_number"]').val())
                    data.kids_card_number = $('input[name="kids_card_number"]').val();

                if(_data.kids_guardian_name !== $('input[name="kids_guardian_name"]').val())
                    data.kids_guardian_name = $('input[name="kids_guardian_name"]').val();

                if(_data.kids_guardian_phone !== $('input[name="kids_guardian_phone"]').val())
                    data.kids_guardian_phone = $('input[name="kids_guardian_phone"]').val();

                if(_data.kids_emergency_name !== $('input[name="kids_emergency_name"]').val())
                    data.kids_emergency_name = $('input[name="kids_emergency_name"]').val();

                if(_data.kids_emergency_phone !== $('input[name="kids_emergency_phone"]').val())
                    data.kids_emergency_phone = $('input[name="kids_emergency_phone"]').val();


                //领取方式
                if(_data.pakcage_get_way !== $('input[name="pakcage_get_way"]').val())
                    data.pakcage_get_way = $('input[name="pakcage_get_way"]').val();

                if(_data.pakcage_get_name !== $('input[name="pakcage_get_name"]').val())
                    data.pakcage_get_name = $('input[name="pakcage_get_name"]').val();

                if(_data.pakcage_get_phone !== $('input[name="pakcage_get_phone"]').val())
                    data.pakcage_get_phone = $('input[name="pakcage_get_phone"]').val();

                if(_data.pakcage_get_address !== $('input[name="pakcage_get_address"]').val())
                    data.pakcage_get_address = $('input[name="pakcage_get_address"]').val();

                //支付信息
                if(_data.pay_status !== $('input[name="pay_status"]').val())
                    data.pay_status = $('input[name="pay_status"]').val();

                if(_data.transaction_id !== $('input[name="transaction_id"]').val())
                    data.transaction_id = $('input[name="transaction_id"]').val();

                if(_data.transaction_date !== $('input[name="transaction_date"]').val())
                    data.transaction_date = $('input[name="transaction_date"]').val();
                $.ajax({
                    method: 'POST',
                    url: '/racer/edit',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: data,
                    success: function(data, status, xhr){
                        $('#modal-edit-datatable').modal('hide');
                        _table.ajax.reload();
                    }
                });
            }

        },

        // =========================================================================
        // ACTION DELETE ROW DATATABLES
        // =========================================================================
        handleActionDeleteDatatable: function () {
            var _table, _data;

            $('#datatable-sample').on('click', '.btn-delete', function(){
                showModalDialog(this);
            });

            $('#modal-delete-datatable').modal({ show: false });

            $('#modal-delete-datatable').on('show.bs.modal', function (e){
                var $dlg = $(this);

                var $tr    = $($dlg.data('btn')).closest('tr');
                var $table = $($dlg.data('btn')).closest('table');
                var data = $table.DataTable().row($tr).data();

                $('.row-name', $dlg).html(data.p1_name);

                _table = $table.DataTable();
                _data = data;
            });

            function showModalDialog(elBtn){
                $('#modal-delete-datatable').data('btn', elBtn);
                $('#modal-delete-datatable').modal('show');
            }

            $('#modal-delete-datatable').on('click', '.btn-delete-confirm', function(){
                $.ajax({
                    method: 'POST',
                    url: '/racer/delete',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: {"id": _data.id},
                    success: function(data, status, xhr){
                        _table.ajax.reload();
                    }
                });
            });
        },


        // =========================================================================
        // CREATEC PAGE
        // =========================================================================

        // init categories select
        initCategories: function(){
            var html_option_format = '<option value="{0}">{1}</option>';

            $.each(this.getCategoriesData(), function(n, o){
                $("#categories").append(html_option_format.replace(/\{\d\}/g, o.name));
            });

        },

        // get categories data
        getCategoriesData: function() {
            return [
                {
                    name: "Accomodation",
                    value: "Accomodation"
                },
                {
                    name: "Choclate Store",
                    value: "Choclate Store"
                },
                {
                    name: "Cheese Store",
                    value: "Cheese Store"
                },
                {
                    name: "Museum/Tourist Attractions",
                    value: "Museum/Tourist Attractions"
                },
                {
                    name: "Restaurant",
                    value: "Restaurant"
                },
                {
                    name: "Retail Stores",
                    value: "Retail Stores"
                },
                {
                    name: "Luxury Stores",
                    value: "Luxury Stores"
                }
            ]
        },

        // form validate
        bindValidate: function(){
            $("#form-create").validate({
                rules:{
                    grouptype:{
                        required:true
                    },
                    p1_tag:{
                        required:true
                    },
                    p1_name:{
                        required:true
                    },
                    p1_sex:{
                        required:true
                    },
                    p1_birthday:{
                        required:true
                    },
                    p1_teesize:{
                        required:true
                    },
                    p1_card_type:{
                        required:true
                    },
                    p1_card_number:{
                        required:true
                    },
                    p1_phone:{
                        required:true
                    },
                    p1_emergency_name:{
                        required:true
                    },
                    p1_emergency_phone:{
                        required:true
                    },

                    pakcage_get_way:{
                        required:true
                    },

                },
                messages: {

                },
                highlight:function(element) {
                    $(element).parents('.form-group').addClass('has-error has-feedback');
                },
                unhighlight: function(element) {
                    $(element).parents('.form-group').removeClass('has-error');
                },
                submitHandler: function(form) {
                    if($(".btn-cancel").attr("data-action") != "cancel")
                    {
                        form.submit();
                    }
                }
            });
        },

        // init maps
        init_map: function(){

            AppPage.map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 48.1264118, lng: 4.1351682},
                zoom: 4
            });

            AppPage.geocoder = new google.maps.Geocoder();
        },

        // bind search button when input address
        bindSearch: function(){
            $("#address_search").click(function(){
                var address = $("#address").val();

                var address_full = address;

                AppPage.geocoder.geocode({'address': address_full}, function(results, status){
                    if (status === google.maps.GeocoderStatus.OK) {
                        AppPage.map.setCenter(results[0].geometry.location);
                        var marker = new google.maps.Marker({
                            map: AppPage.map,
                            position: results[0].geometry.location
                        });

                        AppPage.map.setZoom(18);

                        $("#longitude").val(results[0].geometry.location.lng());
                        $("#latitude").val(results[0].geometry.location.lat());
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            });
        },


        // bind submit button
        bindSubmit: function(){
            $("#form-submit").click(function(){
                var province = $("#province").val();
                $("#province_val").val(province);
            });
        },

        // Bind Cancel Button
        bindCancelButton: function(){
            $(".btn-cancel").click(function(){
                $(this).attr("data-action", "cancel");
                window.location.href = '/store/index';
            });
        },

        // =========================================================================
        // CUSTOM TARGETS
        // =========================================================================

        // =========================================================================
        // TAGS CONFIG
        // =========================================================================
        tagsConfig: function(){
            this.chosenSelect();
            this.textareaMaxlength();
            this.textareaAutosize();
            //this.loadHolderJS();
            this.bootstrapDatepicker();
        },

        // =========================================================================
        // CHOSEN SELECT
        // =========================================================================
        chosenSelect: function () {
            if($('.chosen-select').length){
                $('.chosen-select').chosen();
            }
        },

        // =========================================================================
        // TEXTAREA MAXLENGTH
        // =========================================================================
        textareaMaxlength: function () {
            if($('.character-limit').length){
                $('.character-limit').maxlength({
                    alwaysShow: true,
                    threshold: 20,
                    warningClass: "label label-success",
                    limitReachedClass: "label label-danger",
                    separator: ' of ',
                    preText: 'You have ',
                    postText: ' chars remaining.',
                    placement: 'centered-right'
                });
            }
        },

        // =========================================================================
        // TEXTAREA AUTOSIZE
        // =========================================================================
        textareaAutosize: function () {
            if($('.autosize').length){
                $('.autosize').autosize();
            }
        },

        // =========================================================================
        // BOOTSTRAP DATEPICKER
        // =========================================================================
        bootstrapDatepicker: function () {

            // Default datepicker (options)
            // $('#p1_birthday').datepicker({
            //     format: 'yyyy-mm-dd',
            //     todayBtn: 'linked'
            // });

        },

        // =========================================================================
        // CHECKBOX EVENT
        // =========================================================================
        bindCheckboxEvent: function(){
            function hideFamilyForm()
            {
                $.each($('.form-p2'), function(n, o){
                    $(o).hide();
                });

                $.each($('.form-kids'), function(n, o){
                    $(o).hide();
                });
            }

            function showFamilyForm()
            {
                $.each($('.form-p2'), function(n, o){
                    $(o).show();
                });

                $.each($('.form-kids'), function(n, o){
                    $(o).show();
                });
            }

            function changeGroupType(group_type){
                $("#grouptype").val(group_type);
            }

            $('input[type=radio][name=radio_grouptype]').change(function() {
                if (this.value == '5公里') {
                    hideFamilyForm();
                    changeGroupType('5公里');
                }else if(this.value == '10公里') {
                    hideFamilyForm();
                    changeGroupType('10公里');
                }
                else if (this.value == '亲子跑') {
                    showFamilyForm();
                    changeGroupType('亲子跑');
                }
            });

            $('input[type=radio][name=radio_pakcage_get_way]').change(function() {
                if (this.value == '顺丰到付') {
                    $("input[name=pakcage_get_way]").val('顺丰到付');
                }else if(this.value == '现场领取') {
                    $("input[name=pakcage_get_way]").val('现场领取');
                }
            });

            $('input[type=radio][name=radio_p1_sex]').change(function() {
                if (this.value == '男') {
                    $("input[name=p1_sex]").val('男');
                }else if(this.value == '女') {
                    $("input[name=p1_sex]").val('女');
                }
            });

            $('input[type=radio][name=radio_p2_sex]').change(function() {
                if (this.value == '男') {
                    $("input[name=p2_sex]").val('男');
                }else if(this.value == '女') {
                    $("input[name=p2_sex]").val('女');
                }
            });

            $('input[type=radio][name=radio_kids_sex]').change(function() {
                if (this.value == '男') {
                    $("input[name=kids_sex]").val('男');
                }else if(this.value == '女') {
                    $("input[name=kids_sex]").val('女');
                }
            });

        },


        // Bind Click Event
        bindClickEvent: function(){

        },
    };
}();

AppPage.init();