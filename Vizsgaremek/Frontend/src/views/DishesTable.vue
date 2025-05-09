<template>
    <div class="my-container overflow-hidden" ref="mycontainer">
        <div class="row m-0">
            <!-- Receptek táblázat -->
            <div class="col-3 p-0">
                <div class="position-relative mb-3">
                    <h2 class="text-center">Receptek</h2>
                    <button class="btn btn-success position-absolute top-0 end-0 m-2 me-5"
                        @click="onClickNew()">+</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-dark table-hover mx-auto rounded overflow-hidden">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th scope="col">Étel</th>
                                <th scope="col">Kategória</th>
                                <th scope="col">Recept</th>
                            </tr>
                        </thead>
                        <tbody class="my-tbody" :style="{ height: (myContainerHeight - 200) + 'px' }">
                            <tr v-for="item in dishes" :key="item.id" @click="onClickTr(item.id)"
                                :class="{ active: item.id === selectedDish }">
                                <td class="text-nowrap overflow-hidden">{{ item.name }}</td>
                                <td class="overflow-hidden">{{categories.find(c => c.id === item.category_id)?.name ||
                                    'Nincs kategória'}}</td>
                                <td class="overflow-hidden">{{ item.recipe.length > 15 ? item.recipe.slice(0, 15) +
                                    '...' : item.recipe }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Leírás(hozzávalók, elkészítés) -->
            <div class="col-3 p-0">
                <div v-if="selectedDish">
                    <h2 class="text-center">Leírás</h2>
                    <p class="custom-scroll-box-dark" :style="{ height: ((myContainerHeight / 5) * 2) + 'px' }">
                        {{dishes.find(d => d.id === selectedDish)?.recipe}}
                    </p>
                    <hr>
                    <h2 class="text-center">Hozzávalók</h2>
                    <div class="custom-scroll-list">
                        <ul class="list-group bg-dark text-white m-0">
                            <li class="list-group-item bg-dark text-white text-center border-secondary"
                                v-for="item of selectedDishIngredients" :key="item.id">
                                {{ item.quantity ? item.quantity : '' }} {{ item.unitname }} {{ item.ingredientname }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Szerkesztés/Új -->
            <div class="col-6 p-0">
                <div v-if="selectedDish || state === 'c'">
                    <!-- Szerkesztés -->
                    <div v-if="state === 'u'">
                        <h2 class="text-center">Szerkesztés</h2>
                        
                    </div>

                    <!-- Új -->
                    <div v-if="state === 'c'">
                        <h2 class="text-center">Új recept</h2>
                        <div class="row">
                            <form class="row g-3 bg-dark text-white p-4 rounded border border-secondary">
                                <div class="col-md-6">
                                    <label for="dishName" class="form-label">Az étel neve</label>
                                    <input type="text" class="form-control bg-dark text-white border-secondary"
                                        id="dishName" v-model="newDishName">
                                </div>
                                <div class="col-md-6">
                                    <label for="category" class="form-label">Kategória</label>
                                    <select class="form-select bg-dark text-white border-secondary" id="category"
                                        v-model="newDishCategoryId">
                                        <option disabled value="">Válassz kategóriát</option>
                                        <option v-for="category in categories" :key="category.id" :value="category.id">
                                            {{ category.name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="description" class="form-label">Leírás</label>
                                    <textarea class="form-control bg-dark text-white border-secondary" id="description"
                                        rows="5" v-model="newDishRecipe"></textarea>
                                </div>

                                <!-- Hozzávalók -->
                                <div class="col-md-6">
                                    <label class="form-label d-block text-center">Szükséges hozzávalók</label>
                                    <ul class="list-group custom-scroll-list">
                                        <li v-for="item in ingredients" :key="item.id"
                                            class="list-group-item bg-dark text-white text-center border-secondary position-relative rounded">
                                            <input type="checkbox"
                                                class="form-check-input custom-dark-checkbox position-absolute start-0 top-50 translate-middle-y ms-2"
                                                :id="`${item.id}Checkbox`" :value="item" :true-value="item"
                                                :false-value="null" @change="onIngredientToggle(item)"
                                                :checked="selectedIngredients.some(i => i.ingredient_id === item.id)" />
                                            <label class="form-check-label w-100" :for="`${item.id}Checkbox`">{{
                                                item.name }}</label>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Mennyiség / Mértékegység -->
                                <div class="col-md-6">
                                    <label class="form-label d-block text-center">Mennyiségek / Mértékegységek</label>
                                    <ul class="list-group custom-scroll-list">
                                        <li class="list-group-item bg-dark text-white text-center border-secondary d-flex align-items-center justify-content-between gap-2"
                                            v-for="item in selectedIngredients" :key="item.ingredient_id">
                                            <!-- mennyiség -->
                                            <input type="number" class="form-control form-control-sm w-25"
                                                v-model.number="item.quantity" />

                                            <!-- mértékegység -->
                                            <select class="form-select form-select-sm w-25" v-model="item.selectedUnit">
                                                <option v-for="unit in units" :key="unit.id" :value="unit.id">
                                                    {{ unit.name }}
                                                </option>
                                            </select>

                                            <!-- Hozzávaló neve -->
                                            <span class="flex-grow-1 text-start">{{ item.ingredientname }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-4">
        <button type="button" class="btn btn-success" @click="saveDish">
            Recept mentése
        </button>
    </div>
</template>

<script>
import { useAuthStore } from "@/stores/useAuthStore.js";
import { BASE_URL } from '@/helpers/baseUrls';
import axios from "axios";

export default {
    data() {
        return {
            state: 'u',
            stateAuth: useAuthStore(),
            urlMeals: `${BASE_URL}/meals`,
            urlCategories: `${BASE_URL}/categories`,
            urlUnits: `${BASE_URL}/units`,
            urlIngredients: `${BASE_URL}/ingredients`,
            urlDishes: `${BASE_URL}/dishes`,
            urlComponents: `${BASE_URL}/components`,
            urlselectedDishIngredients: `${BASE_URL}/querySelectedDishIngredients`,
            meals: [],
            categories: [],
            units: [],
            ingredients: [],
            dishes: [],
            components: [],
            selectedDish: null,
            selectedDishIngredients: [],
            selectedIngredients: [],
            newDishName: null,
            newDishCategoryId: null,
            newDishRecipe: null,
            myContainerHeight: null,
        };
    },
    watch: {
        selectedDish() {
            this.getSelectedDishIngredients(this.selectedDish);
        }
    },
    async mounted() {
        this.$nextTick(() => {
            this.myContainerHeight = this.$refs.mycontainer.getBoundingClientRect().height;
        });
        await this.getMeals();
        await this.getCategories();
        await this.getUnits();
        await this.getIngredients();
        await this.getDishes();
        await this.getComponents();
    },
    methods: {
        async saveDish() {
            const token = this.stateAuth.token;
            const url = `${BASE_URL}/dishes`; 
            const headers = {
                Accept: "application/json",
                "Content-Type": "application/json",
                Authorization: `Bearer ${token}`,
            };

            console.log(this.newDishName);



            const dishData = {
                name: this.newDishName,
                category_id: this.newDishCategoryId,
                recipe: this.newDishRecipe,
            };

            try {
                const response = await axios.post(url, dishData, { headers });
                const dishId = response; 
                console.log(dishId);

                this.saveIngredients(dishId);
            } catch (error) {
                this.errorMessages = "Szerver hiba az étel mentésekor.";
                console.error("saveDish error:", error);
            }
        },


        async saveIngredients(dishId) {
            const token = this.stateAuth.token;
            const url = `${BASE_URL}/components`;
            const headers = {
                Accept: "application/json",
                "Content-Type": "application/json",
                Authorization: `Bearer ${token}`,
            };

            for (let item of this.selectedIngredients) {
                const ingredientData = {
                    quantity: item.quantity,
                    unit_id: item.selectedUnit,
                    dish_id: dishId,
                    ingredient_id: item.ingredient_id,
                    number_of_people: 4
                };

                try {
                    await axios.post(url, ingredientData, { headers });
                    console.log('Hozzávaló sikeresen mentve!');
                } catch (error) {
                    this.errorMessages = "Szerver hiba a hozzávaló mentésekor.";
                    console.error("saveIngredients error:", error);
                }
            }
        },

        onIngredientToggle(item) {
            const index = this.selectedIngredients.findIndex(i => i.ingredient_id === item.id);
            if (index === -1) {
                this.selectedIngredients.push({
                    ingredient_id: item.id,
                    ingredientname: item.name,
                    quantity: null,
                    selectedUnit: null
                });
            } else {
                this.selectedIngredients.splice(index, 1);
            }
        },

        buildComponentsPayload(dishId) {
            return this.selectedIngredients.map(item => ({
                quantity: item.quantity,
                unit_id: item.selectedUnit,
                dish_id: dishId,
                ingredient_id: item.ingredient_id,
                number_of_people: 4 
            }));
        },

        async getSelectedDishIngredients(id) {
            try {
                const response = await axios.get(`${this.urlselectedDishIngredients}/${id}`, {
                    headers: { Authorization: `Bearer ${this.stateAuth.token}` },
                });
                this.selectedDishIngredients = response.data.data;
                this.selectedIngredients = this.selectedDishIngredients.map(item => ({
                    id: item.ingredient_id,
                    name: item.ingredientname,
                    quantity: item.quantity,
                    selectedUnit: this.units.find(u => u.name === item.unitname)?.id || null
                }));
            } catch (error) {
                console.error("getSelectedDishIngredients error:", error);
            }
        },
        async getMeals() {
            try {
                const response = await axios.get(this.urlMeals, {
                    headers: { Authorization: `Bearer ${this.stateAuth.token}` },
                });
                this.meals = response.data.data;
            } catch (error) {
                console.error("getMeals error:", error);
            }
        },
        async getCategories() {
            try {
                const response = await axios.get(this.urlCategories, {
                    headers: { Authorization: `Bearer ${this.stateAuth.token}` },
                });
                this.categories = response.data.data;
            } catch (error) {
                console.error("getCategories error:", error);
            }
        },
        async getUnits() {
            try {
                const response = await axios.get(this.urlUnits, {
                    headers: { Authorization: `Bearer ${this.stateAuth.token}` },
                });
                this.units = response.data.data;
            } catch (error) {
                console.error("getUnits error:", error);
            }
        },
        async getIngredients() {
            try {
                const response = await axios.get(this.urlIngredients, {
                    headers: { Authorization: `Bearer ${this.stateAuth.token}` },
                });
                this.ingredients = response.data.data;
            } catch (error) {
                console.error("getIngredients error:", error);
            }
        },
        async getDishes() {
            try {
                const response = await axios.get(this.urlDishes, {
                    headers: { Authorization: `Bearer ${this.stateAuth.token}` },
                });
                this.dishes = response.data.data;
            } catch (error) {
                console.error("getDishes error:", error);
            }
        },
        async getComponents() {
            try {
                const response = await axios.get(this.urlComponents, {
                    headers: { Authorization: `Bearer ${this.stateAuth.token}` },
                });
                this.components = response.data.data;
            } catch (error) {
                console.error("getComponents error:", error);
            }
        },
        setState(state) {
            this.state = state;
        },
        onClickNew() {
            this.setState('c');
            this.selectedDish = null;
            this.selectedDishIngredients = [];
            this.selectedIngredients = [];
        },
        onClickTr(id) {
            this.selectedDish = id;
            this.setState('u');
        },
        toggleIngredient(ingredient) {
            const index = this.selectedIngredients.findIndex(i => i.id === ingredient.id);
            if (index !== -1) {
                this.selectedIngredients.splice(index, 1);
            } else {
                this.selectedIngredients.push({
                    id: ingredient.id,
                    name: ingredient.name,
                    quantity: null,
                    selectedUnit: null
                });
            }
        }
    }
};
</script>


<style scoped>
.custom-dark-checkbox {
    background-color: #343a40;
    border: 1px solid #495057;
}

.custom-dark-checkbox:checked {
    background-color: #198754;
    border-color: #198754;
}

.custom-scroll-list {
    margin: 0 auto;
    width: 80%;
    max-height: 300px;
    overflow-y: auto;
    padding: 0;
    border-radius: 0.5rem;
    border: 1px solid #343a40;
    background-color: #212529;
    scrollbar-width: thin;
    scrollbar-color: #495057 #1b1e21;
}

.custom-scroll-list .list-group-item {
    border: none;
    border-bottom: 1px solid #343a40;
}

.custom-scroll-list .list-group-item:last-child {
    border-bottom: none;
}



.custom-scroll-box-dark {
    width: 80%;
    margin: 0 auto;
    overflow-y: auto;
    padding: 1rem;
    background-color: #212529;
    color: #ffffff;
    border: 1px solid #343a40;
    border-radius: 0.5rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.25);
    scrollbar-width: thin;
    scrollbar-color: #495057 #1b1e21;
}


.custom-scroll-box-dark::-webkit-scrollbar {
    width: 8px;
}

.custom-scroll-box-dark::-webkit-scrollbar-track {
    background: #1b1e21;
    border-radius: 0.5rem;
}

.custom-scroll-box-dark::-webkit-scrollbar-thumb {
    background-color: #495057;
    border-radius: 0.5rem;
    border: 2px solid transparent;
    background-clip: content-box;
}

.table {
    max-width: 80%;
    max-height: 70% !important;
    margin: 0;
}

.my-tbody {
    display: block;
    overflow-y: auto;
}

.table thead,
.table tbody tr {
    display: table;
    width: 100%;
    table-layout: fixed;
}

.table thead {
    width: 100%;
}

.table tbody {
    display: block;
}
</style>
