define(['ko', 'uiComponent', 'Magento_Checkout/js/model/quote','jquery'], function (ko, Component, quote,$) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Tigren_DeliveryDateTime/delivery-date'
        },
        deliveryDate: ko.observable(''),
        deliveryTime: ko.observable(''),
        deliveryTimeOptions: ko.observableArray([]),

        initialize: function () {
            this._super();
            var deliveryTimeOptions = [];
            var deliveryDayOff=[];
            $.ajax({
                url: '/rest/V1/rest_dev/getHourShipping/',
                type: 'POST',
                dataType: 'text',
                success: function (response) {
                    // console.log(response);
                    var timeOptions = JSON.parse(response);


                    for (const key in timeOptions) {
                        const timeOption = timeOptions[key];
                        const timeStart = timeOption.time_start;
                        const timeEnd = timeOption.time_end;
                        deliveryTimeOptions.push(`From ${timeStart} to ${timeEnd}`);
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            })
            this.deliveryTimeOptions=deliveryTimeOptions;
            $.ajax({
                url: '/rest/V1/rest_dev/getDayOffShipping/',
                type: 'POST',
                dataType: 'text',
                success: function (response) {
                    // console.log(response);
                    var dayOffOptions = JSON.parse(response);
                    console.log(dayOffOptions);
                    for (const key in dayOffOptions) {
                        const dayOffOption = dayOffOptions[key];
                        const dayOff =dayOffOption.date;
                        deliveryDayOff.push(dayOff);
                    }
                    console.log(deliveryDayOff);
                }
            })
            this.deliveryDate.subscribe(function (value) {
                console.log(value);
                for (const key in deliveryDayOff){
                    if (deliveryDayOff[key]===value){
                        window.alert('Sorry , We are off today!');
                    }
                }
            });
            return this;
        },

    });
});
