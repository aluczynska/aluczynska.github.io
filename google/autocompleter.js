Vue.component('v-autocompleter', {
  template: `
    <div class="vue-autocompleter">  
      <input
        ref="first"
        :value="value"
        type="text"
        class="search_input"
        @input="$emit('input', $event.target.value)"
        @keyup.down="downKey"
        @keyup.up="upKey"
        @keyup.enter="enterKey" />
      <div class="bottom_border"></div>
      <div class="list">
        <ul v-for="(city, index) in filteredCities">
          <li v-on:click="listclicked(city.name)" :class="{greyspace: index == in_focus}">
            <a v-on:click="choose(index)" v-html="bolderize(city)"></a>
          </li>
        </ul>
      </div>
    </div>
    `,

  props: ['value','options'],

  data: function () {
    return {
      change_class: 0,
      cities: window.cities,
      in_focus: -1,
      foc: true,
      selected_city: '',
      googleSearch_temp: '',
      cities_update: true,
      filteredCities: []
    }
  },
  
  watch: {
    in_focus: function(){
      this.cities_update = false;      
      if (this.in_focus >= 0) {
        this.$emit('input', this.filteredCities[this.in_focus].name);
      }
    },

    value: function(){
      if(this.value.length == 0){
        this.filteredCities = [];
      } 
      else{ 
        this.cities_update=true;
        if(this.in_focus == -1){
          this.googleSearch_temp = this.value; 
          this.createcity();     
        }
      }
    },
  },

  methods: {

    createcity(){
          let result = this.cities.filter(city => city.name.includes(this.value));
          if(result.length > 10){
            this.filteredCities = result.slice(1, 11);
          }
          else{
            this.filteredCities = result;
          }
        this.in_focus = -1;
    },
    listclicked(name){
        this.$emit('input', this.value);
        this.enterKey();
    },

    choose(i){
        this.$emit('input', this.filteredCities[i].name);
    },
    enterKey: function(event) {
      if(event) {
        this.createcity();
        this.in_focus = -1;
      }
      this.$emit('enter', this.value);
    },
    upKey() {
      if(this.in_focus > -1){
        this.in_focus -= 1;
      } else if(this.in_focus == 0) {
        this.in_focus = this.filteredCities.length - 1;
      }
    },
    downKey() {
      if(this.in_focus < this.filteredCities.length - 1){
        this.in_focus += 1;
      }
      else if(this.in_focus == this.filteredCities.length - 1){
        this.in_focus = -1;
      }
    },
    bolderize(input_city){
      let regex = new RegExp(this.googleSearch_temp, "gi");
      let bold = "<b>" + 
        input_city.name.replace(regex, match =>
            {return "<span class='normal'>"+ match +"</span>";}) 
                + "</b>";
      return bold;
    }
  },
})
