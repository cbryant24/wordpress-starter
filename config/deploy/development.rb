############################################
# Staging Server
############################################

set :stage, :development
set :stage_domain, "localhost:9999"

############################################
# Setup Git
############################################

# The git branch for staging
def current_git_branch
  branch = `git symbolic-ref HEAD 2> /dev/null`.strip.gsub(/^refs\/heads\//, '')
  puts "Deploying branch #{branch}"
  branch
end

# Set the deploy branch to the current branch
set :branch, current_git_branch