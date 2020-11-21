
<template>
  <div class="container mt-n10">
    <div class="card">
      <div class="card-body">
        <div class="form-group">
          <label>Fecha Orden</label>
          <input
            type="date"
            name="dateOrder"
            class="form-control"
            required
            v-model="dateOrder"
          />
        </div>
        <div class="alert alert-danger" role="alert" v-if="showError === true">
          El atributo es requerido
        </div>

        <div class="form-group">
          <label>Total</label>
          <input
            type="number"
            name="total"
            class="form-control"
            required
            v-model="total"
          />
        </div>

        <div class="form-group">
          <label>Observaciones</label>
          <input
            type="text"
            name="observations"
            class="form-control"
            required
            v-model="observations"
          />
        </div>

        <div class="form-group">
          <label>Cliente</label>
          <select v-model="personSelected" class="form-control">
            <option value="">Seleccione....</option>
            <option v-for="(person, index) in persons" :value="person.id">
              {{ person.name }}
            </option>
          </select>
        </div>

        <div class="form-group">
          <label>Precio</label>
          <input
            type="number"
            name="price"
            class="form-control"
            required
            v-model="price"
          />
        </div>

        <div class="form-group row">
          <div class="col-md-10">
            <label>Productos</label>
            <select
              v-model="productSelected"
              class="form-control"
              @change="addProduct()"
            >
              <option value="">Seleccione...</option>
              <option v-for="(product, index) in products" :value="product">
                {{ product.name }}
              </option>
            </select>
          </div>
        </div>
        <div class="form-group row justify-content-center">
          <table
            class="table table-responsive table-light col-6 col-sm-12 col-md-8 col-lg-6 justify-content-center"
          >
            <!-- <div class="col-md-12 mt-2"> -->
            <thead>
              <tr>
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <!-- :key="product.value" -->
              <tr v-for="(product, index) in arrProducts">
                <th scope="row">{{ product.barcode }}</th>
                <td>{{ product.name }}</td>
                <td>
                  <!-- Necesitamos hacer un for que no interfiera con este -->
                  <!-- <div > -->
                  <input
                    v-model="product.quantity_to_buy"
                    type="text"
                    class="form-control quantity"
                    required
                    placeholder="Ingrese cantidad"
                  />
                  <!-- <input v-model="product.value" /> -->
                  <!-- {{ (flag = true) }} -->
                  <!-- v-for="quantity in quantities" :key="quantity.value" -->
                  <!-- name="quantity" -->
                  <!-- key="product.quantity" -->
                  <!-- </div> -->
                </td>
                <td>${{ product.price }}</td>
                <td>
                  <div class="col-md-4 mt-2">
                    <button
                      class="btn btn-danger"
                      @click="removeProduct(index)"
                    >
                      -
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
            <!-- </div> -->
          </table>
        </div>

        <div class="d-flex justify-content-center">
          <button
            class="btn btn-primary float-right mt-5"
            @click="submitForm()"
          >
            Guardar
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      dateOrder: "",
      total: "",
      observations: "",
      personSelected: "",
      price: "",
      productSelected: "",
      // quantities: [],
      // flag: false,
      arrProducts: [],
      showError: false,
    };
  },
  props: {
    url: {
      type: String,
      default: "",
    },
    persons: {
      type: Array,
      default: [],
    },
    products: {
      type: Array,
      default: [],
    },
  },
  methods: {
    addProduct: function () {
      // Cantidad input field unique value
      console.log(this.arrProducts[0]);
      if (this.flag == true) {
        this.arrProducts.push({ quantity_to_buy: "" });
        // this.quantities.push(this.arrProducts)
      }

      // console.log(this.quantities);

      // this.flag = true;
      console.log(this.arrProducts);
      console.log(this.arrProducts[0]); 
      // let quantities = [];
      // this.quantities.push({ value: "" });
      // console.log(this.quantities);
      // if(this.flag != true)
      // this.arrProducts.push(this.quantities);
      // this.flag = true;

      // for (let i = 0; i < this.arrProducts.length; i++) {
      //   console.log(this.arrProducts[i]);
      //   console.log(this.arrProducts[i][0]);
      //   console.log(this.arrProducts[i].value);
      // }
      // // console.log(this.arrProducts);
      // console.log(`PRUEBA: ` + this.arrProducts[0]);
      // console.log(`PRUEBA: ` + this.arrProducts[0][0]);
      // console.log(`PRUEBA: ` + this.arrProducts[0].value);
      // console.log(this.arrProducts[0][0]);
      // console.log(this.arrProducts[0][value]);
      // console.log(this.arrProducts[quantities]);
      // console.log(this.arrProducts.quantities);

      if (this.productSelected !== "") {
        if (typeof this.existProduct(this.productSelected.id) === "undefined") {
          this.arrProducts.push(this.productSelected);
          this.productSelected = "";
        } else {
          alert("El producto ya se encuentra seleccionado");
        }
      } else {
        alert("debe seleccionar por lo menos un producto");
      }
    },
    existProduct: function (productId) {
      let existProduct = this.arrProducts.find(function (product) {
        return product.id === productId;
      });
      return existProduct;
    },
    removeProduct: function (index) {
      this.arrProducts.splice(index, 1);
    },
    submitForm: function () {
      // let arrQuantities = "";

      // for (let i = 0; i < this.arrProducts.length; i++) {
      //   document.querySelectorAll(".quantity").forEach((p, i) => {

      //     this.arrProducts['quantities'] = p.value;
      //     // console.log(p[i].value);
      //     // arrQuantities.push(p[i].value);
      //   });
      // // }
      // // console.log(arrQuantities);
      // console.log(this.arrProducts);
      // console.log(document.querySelectorAll('quantity'));

      if (
        this.personSelected != "" &&
        this.dateOrder != "" &&
        this.total != "" &&
        this.observations != "" &&
        this.price != "" &&
        this.quantity != "" &&
        this.arrProducts.length > 0
      ) {
        let data = {
          dateOrder: this.dateOrder,
          total: this.total,
          observations: this.observations,
          person_id: this.personSelected,
          price: this.price,
          quantity: this.quantity,
          arrProducts: this.arrProducts,
        };

        axios
          .post(this.url, data)
          .then((response) => {
            if (response.data.success === true) {
              alert(response.data.message);
              location.href = this.url;
            } else alert(response.data.message);
          })
          .catch((error) => {
            console.log(error);
            alert("Error Insertando el producto");
          });
      } else {
        this.showError = true;
      }
    },
  },
  mounted() {},
};
</script>
