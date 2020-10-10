############################################
# Staging Server
############################################

set :stage, :staging
set :stage_domain, "[add staging site name]"
server "[add server name]", user: "deploy", roles: %w{web app db}
set :deploy_to, "/var/www/html"
set :shared_directory, "/var/www/html/shared"
set :current_directory, "/var/www/html/current"

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
 