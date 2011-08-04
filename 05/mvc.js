// MVP - Simple Supervising Controller

var myapp = {};

myapp.Model = function () {
    var val = 5;
    this.add = function (v) {
        val += v;
    };
    this.sub = function (v) {
        val -= v;
    };
    this.getVal = function () {
        return val;
    };
};

myapp.Presenter = function () {
    var model = null;
    this.init = function () {
        model = new myapp.Model();
    };
    this.increase = function () {
        model.add(1);
    };
    this.decrease = function () {
        model.sub(1);
    };
    this.getModel = function () {
        return model;
    };
};

myapp.view = {
    $increaseButton: null,
    $decreaseButton: null,
    $num: null,
    presenter: null,
    init: function () {
        this.presenter = new myapp.Presenter();
        this.$increaseButton = $('#increase');
        this.$decreaseButton = $('#decrease');
        this.$num = $('#num');
        this.presenter.init();
        this.bindEvents();
        this.$num.val(this.presenter.getModel().getVal());
    },
    bindEvents: function () {
        var view = this;
        var presenter = this.presenter;
        this.$increaseButton.click(function () {
            presenter.increase();
            view.$num.val(presenter.getModel().getVal());
        });
        this.$decreaseButton.click(function () {
            presenter.decrease();
            view.$num.val(presenter.getModel().getVal());
        });
    }
};

$(function () {
    myapp.view.init();
});