<script>
import NominationForm from './NominationForm'
import AlertCard from './AlertCard'

export default {
  data () {
    return {
      error: false,
      errorMessage: ''
    }
  },
  methods: {
    submitted: function (event) {
      window.location('/nominations?s=1');
    }
  },
  components: {
    NominationForm,
    AlertCard
  }
}
</script>
