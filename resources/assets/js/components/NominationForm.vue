<template>
  <section class="nomination-form">
    <form :action="submit_link" method="POST">
        <input name="_token" :value="getCSRF()" type="hidden" class="csrf">
      <div class="card">
        <div class="card-header">About your nominee</div>

        <div class="form-group">
          <label for="nominee-first-name" class="control-label">First name <span class="required-star">*</span></label>
          <input name="nominee-first-name" class="form-control" required v-model="nomination.nominee_first_name">
        </div>

        <div class="form-group">
          <label for="nominee-last-name" class="control-label">Last name <span class="required-star">*</span></label>
          <input name="nominee-last-name" class="form-control" required v-model="nomination.nominee_last_name">
        </div>

        <div class="form-group-fake">
          <label for="nominee-last-name" class="control-label">My nominee is a(n): <span class="required-star">*</span></label>
          <input type="hidden" name="nominee-status" required v-model="nomination.nominee_status">

          <div class="nominee-statuses">
            <div class="row">
              <div class="col-sm-4">
                <input type="button" value="Student" class="status" v-bind:class="{'selected': isNomineeStatusSelected('student')}" @click="setNomineeStatus('student')">
              </div>
              <div class="col-sm-4">
                <input type="button" value="Alumnus" class="status" v-bind:class="{'selected': isNomineeStatusSelected('alumnus')}" @click="setNomineeStatus('alumnus')">
              </div>
              <div class="col-sm-4">
                <input type="button" value="Staff" class="status" v-bind:class="{'selected': isNomineeStatusSelected('staff')}" @click="setNomineeStatus('staff')">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card">
          <div class="card-header">Your words matter</div>
          <div class="form-group">
            <label for="nominee-work" class="control-label">Tell us about your nominee and what is special about his/her work <span class="required-star">*</span></label>
            <textarea name="nominee-work" rows="3" class="form-control" v-model="nomination.nominee_work" required></textarea>
          </div>
          <div class="form-group">
            <label for="nominee-impact" class="control-label">How is their work making a difference?</label>
            <textarea name="nominee-impact" rows="3" class="form-control" v-model="nomination.nominee_impact"></textarea>
          </div>
          <div class="form-group">
            <label for="nominee-links" class="control-label">Are there any links you want to share? (articles, websites, social media...) Also,provide contact information if you have them.</label>
            <textarea name="nominee-links" rows="3" class="form-control" v-model="nomination.nominee_links"></textarea>
          </div>
          <div class="form-group">
            <div class="agree-terms links">By clicking SUBMIT, you agree to our <a href="/terms" target="_blank">Terms and Conditions.</a></div>
          </div>
          <input type="submit" value="Submit" class="action-btn">
      </div>
    </form>
  </section>
</template>

<script>
export default {
  data() {
    return {
      nomination: {
        nominee_first_name: '',
        nominee_last_name: '',
        nominee_status: 'student',
        nominee_work: '',
        nominee_impact: '',
        nominee_links: '',
      },
      submit_link: '/nominations',
      error_message: '',
    };
  },
  props: ['oldNomination', 'update'],
  watch: {
    oldNomination: function() {
      this.getNominationDetails();
    },
  },
  mounted: function() {
    if (this.update) {
      this.getNominationDetails();
    }
  },
  methods: {
    isNomineeStatusSelected: function(status) {
      return status === this.nomination.nominee_status;
    },
    getNominationDetails: function() {
      this.nomination.nominee_first_name = this.oldNomination.nominee_first_name;
      this.nomination.nominee_last_name = this.oldNomination.nominee_last_name;
      this.nomination.nominee_status = this.oldNomination.nominee_status;
      this.nomination.nominee_work = this.oldNomination.nominee_work;
      this.nomination.nominee_impact = this.oldNomination.nominee_impact;
      this.nomination.nominee_links = this.oldNomination.nominee_links;
      this.submit_link = '/nominations/' + this.oldNomination.slug;
    },
    setNomineeStatus: function(status) {
      this.nomination.nominee_status = status;
    },
    getCSRF: function() {
      return document.getElementsByName('csrf-token')[0].content;
    },
  },
};
</script>

<style lang="scss">
.agree-terms {
  color: #ccc;
}
</style>
