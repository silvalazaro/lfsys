<template>
  <div>
    <el-row :gutter="20">
      <el-col>
        <div class="flex">
          <input-cep class="w-2/6" />
          <sys-input
            v-model="address.street"
            label="Logradouro"
            class="w-4/6 ml-2"
          />
          <sys-input
            v-model="address.number"
            label="Número"
            class="w-2/6 ml-2"
          />
        </div>
      </el-col>
    </el-row>
    <el-row :gutter="20">
      <el-col>
        <div class="flex">
          <sys-select
            v-model="address.city.state"
            label="Estado"
            :url="route('ufs.select')"
            class="w-1/6"
          />
          <sys-select
            v-model="location.city"
            label="Cidade"
            :url="route('cities.select')"
            class="w-2/6 ml-2"
          />
          <sys-input
            v-model="location.district"
            label="Bairro"
            class="w-2/6 ml-2"
          />
          <sys-input
            v-model="location.country"
            label="País"
            class="w-1/6 ml-2"
            disabled
          />
        </div>
      </el-col>
    </el-row>
  </div>
</template>

<script lang="ts" setup>
import { computed, reactive, ref } from "vue";
import { location } from "@/store/register/address/location";
import { Address, createRules } from "@/models/register/address";

const props = defineProps({
  modelValue: Address,
});

const address = computed({
  get() {
    return props.modelValue;
  },
  set(value) {
    console.log(value);
  },
});
</script>
