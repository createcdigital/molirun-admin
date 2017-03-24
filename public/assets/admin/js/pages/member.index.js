'use strict';
var BlankonMember = function () {

    // =========================================================================
    // SETTINGS APP
    // =========================================================================

    return {

        // =========================================================================
        // CONSTRUCTOR APP
        // =========================================================================
        init: function () {
            BlankonMember.datatable();
        },

        datatable: function(){
            $('#datatable-sample').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: 'member/data',
                    columns: [
                        { data: 'wechat_headimgurl', name: 'wechat_headimgurl' },
                        { data: 'wechat_nickname', name: 'wechat_nickname' },
                        { data: 'wechat_sex', name: 'wechat_sex' },
                        { data: 'wechat_country', name: 'wechat_country' },
                        { data: 'wechat_province', name: 'wechat_province' },
                        { data: 'wechat_groupid', name: 'wechat_groupid' },
                        { data: 'status', name: 'status' },
                        { data: 'created_at', name: 'created_at' }
                    ]
            });
        }

    };

}();

// Call main app init
BlankonMember.init();