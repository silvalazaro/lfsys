<template>
  <el-tooltip placement="top" v-model:visible="showHelp">
    <template #content>
      <div class="grid place-items-center">
        <div>{{ message }}</div>
        <div v-if="showObservation && observation">{{ observation }}</div>
        <div>
          <el-button
            type="text"
            @click="(showHelp = false), (showObservation = false)"
            ><ep-circle-check
          /></el-button>
        </div>
      </div>
    </template>
    <div class="align-bottom">
      <slot></slot>
      <el-icon class="self-end" @click="doShowHelp"
        ><ep-question-filled
      /></el-icon>
    </div>
  </el-tooltip>
</template>

<script lang="ts" setup>
import { ref } from "vue";
import { watch } from "vue";

interface Props {
  message: string;
  observation?: string;
  help?: boolean;
}

const props = withDefaults(defineProps<Props>(), {
  help: false,
});

const showHelp = ref(props.help || false);

const showObservation = ref(false);

const doShowHelp = () => {
  showObservation.value = true;
  showHelp.value = true;
  _.delay((e) => {
    showHelp.value = false;
    showObservation.value = false;
  }, 5000);
};

watch(
  () => props.help,
  (value) => {
    showHelp.value = !!value
  }
);
</script>
