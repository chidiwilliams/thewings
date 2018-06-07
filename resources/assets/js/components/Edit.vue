<script>
import NominationForm from './NominationForm';

export default {
  components: {
    NominationForm,
  },
  methods: {
    JSONParse: function(obj) {
      return JSON.parse(obj);
    },
  },
};
</script>
