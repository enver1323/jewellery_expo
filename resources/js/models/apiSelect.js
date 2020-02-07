import $ from 'jquery';
import 'select2';

class APISelect {
    constructor(domElement, apiUrl, term = "name") {
        this.domElement = domElement;
        this.apiUrl = apiUrl;
        this.term = term;

        this.initSelect();
    }

    initSelect() {
        let term = this.term;
        $(this.domElement).select2({
            ajax: {
                url: this.apiUrl,
                dataType: 'json',
                data: function (params){
                    return {[term]: params.term};
                },
                processResults: function(data){
                    data = $.map(data.data, function (item) {
                        return {
                            'id': item.id,
                            'text': item[term],
                        }
                    });
                    return {
                        results: data
                    };
                }
            }
        });
    }


}

export default APISelect;
window.APISelect = APISelect;
