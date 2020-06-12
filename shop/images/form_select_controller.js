/**
 * Created by Kingsley on 2015/9/25.
 */

/* Encapsulate functions for selections */
function bindSelection($apply_form, offset) {
    var formSelect = new SelectController(city_list, $apply_form);
    formSelect.renderSelectOptions();
    formSelect.bindingSelected(offset);
    formSelect.bindingCloseOptionsBox();
}

/* Actions of select area at apply form */
function SelectController(data, formContainer) {
    this.data = data;
    this.formContainer = formContainer;
    this.optionsContainer = $(formContainer).find('.select_option');
}
SelectController.prototype = {
    // Render styled option
    renderOpt: function(container, id, name) {
        $(container).append('<li class="options_option" data-id="' + id + '">' + name + '</li>');
        this.bindingOptions($('li.options_option:last-of-type', container));
    },
    // Render options at the options area
    chooseContainer: function(shortName) {
        var optContainer = null;
        var optContainerId = null;
        var initial = shortName.split('')[0];
        if (initial.match(/[a-eA-E]/)) {
            optContainerId = 0;
        } else if (initial.match(/[f-hF-H]/)) {
            optContainerId = 1;
        } else if (initial.match(/[j-lJ-L]/)) {
            optContainerId = 2;
        } else if (initial.match(/[m-qM-Q]/)) {
            optContainerId = 3;
        } else if (initial.match(/[r-tR-T]/)) {
            optContainerId = 4;
        } else if (initial.match(/[w-xW-X]/)) {
            optContainerId = 5;
        } else if (initial.match(/[y-zY-Z]/)) {
            optContainerId = 6;
        }
        optContainer = $(this.optionsContainer).find('div[data-id="' + optContainerId + '"]');
        return optContainer;
    },
    // Render options
    renderSelectOptions: function() {
        for (var i = 0; i < this.data.length; i++) {
            $('select[name="city"]', this.formContainer).append('<option value="' + this.data[i].city_id + '">' + this.data[i].name + '</option>');
            this.renderOpt(this.chooseContainer(this.data[i].short_name), this.data[i].city_id, this.data[i].name);
        }
    },
    // Bind selected area to control the actions
    bindingSelected: function(offset) {
        var _this = this;
        $('.selected', this.formContainer).on('click', function() {
            var optionsContainerHeight = $(_this.optionsContainer).outerHeight();
            $(_this.optionsContainer).css(offset, 0 - optionsContainerHeight);
            _this.changeSelectStatus();
        });
    },
    // Bind click event for options
    bindingOptions: function(option) {
        var _this = this;
        $(option, this.optionsContainer).on('click', function() {
            var id = $(this).data('id');
            var name = $(this).text();
            $('select option[selected="selected"]', _this.formContainer).attr('selected', false);
            $('select option[value="' + id + '"]', _this.formContainer).attr('selected', true);
            $('.select .selected span:first-of-type', _this.formContainer).text(name);
            _this.changeSelectStatus();
        });
    },
    // The actions to change select status
    changeSelectStatus: function() {
        if ($('.arrow', this.formContainer).length > 0) {
            if ($('.arrow', this.formContainer).hasClass('arrow_down')) {
                $('.arrow', this.formContainer).removeClass('arrow_down').addClass('arrow_up');
            } else {
                $('.arrow', this.formContainer).removeClass('arrow_up').addClass('arrow_down');
            }
        }

        if ($(this.optionsContainer).hasClass('hide')) {
            $(this.optionsContainer).removeClass('hide').addClass('show');
        } else {
            $(this.optionsContainer).removeClass('show').addClass('hide');
        }
    },
    bindingCloseOptionsBox: function() {
        var _this = this;
        $(document).on('click', function(e) {
            if(!($(e.target).hasClass('select') || $(e.target).parents().hasClass('select'))) {
                if ($(_this.optionsContainer).hasClass('show')) {
                    _this.changeSelectStatus();
                }
            }
        });
    }
}