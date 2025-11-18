@extends('layouts.app')
@section('title', 'Support')

@section('content')

  {{-- Hero Section --}}
  <section class="bg-primary-blue text-white py-5">
    <div class="container">
      <div class="col-lg-8">
        <h1 class="mb-3">Technical Support</h1>
        <p class="lead text-gray-200">
          24/7 expert support to keep your systems running smoothly
        </p>
      </div>
    </div>
  </section>

  {{-- Support Options --}}
  <section class="py-5 bg-white">
    <div class="container">
      <div class="row g-4 mb-5">
        <div class="col-md-4 text-center">
          <div class="bg-accent-orange rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width:70px;height:70px;">
            <i class="bi bi-telephone text-white fs-3"></i>
          </div>
          <h5>24/7 Hotline</h5>
          <p class="text-muted">Speak directly with our technical support team</p>
          <div class="fw-bold text-primary-blue">0723 639338</div>
          <small class="text-muted">Available 24/7</small>
        </div>

        <div class="col-md-4 text-center">
          <div class="bg-primary-blue rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width:70px;height:70px;">
            <i class="bi bi-envelope text-white fs-3"></i>
          </div>
          <h5>Email Support</h5>
          <p class="text-muted">Send us your technical queries</p>
          <div class="fw-bold text-primary-blue">support@netvoice.com</div>
          <small class="text-muted">Response within 2 hours</small>
        </div>

        <div class="col-md-4 text-center">
          <div class="bg-accent-orange rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width:70px;height:70px;">
            <i class="bi bi-headset text-white fs-3"></i>
          </div>
          <h5>Remote Assistance</h5>
          <p class="text-muted">Quick resolution via remote desktop</p>
          <a href="#" class="btn bg-primary-blue text-white">Start Remote Session</a>
        </div>
      </div>

      {{-- Help Desk Form --}}
      <div class="row g-5">
        <div class="col-lg-6">
          <h2 class="mb-3">Submit a Support Ticket</h2>
          <p class="text-muted mb-4">Fill out the form below and our technical team will respond promptly.</p>

          <form>
            <div class="mb-3">
              <label class="form-label">Name *</label>
              <input type="text" class="form-control" placeholder="Your full name" required>
            </div>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Email *</label>
                <input type="email" class="form-control" placeholder="your@email.com" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Phone *</label>
                <input type="tel" class="form-control" placeholder="+254 XXX XXX XXX" required>
              </div>
            </div>
            <div class="row g-3 mt-3">
              <div class="col-md-6">
                <label class="form-label">Company</label>
                <input type="text" class="form-control" placeholder="Company name">
              </div>
              <div class="col-md-6">
                <label class="form-label">Priority *</label>
                <select class="form-select" required>
                  <option value="low">Low</option>
                  <option value="normal" selected>Normal</option>
                  <option value="high">High</option>
                  <option value="critical">Critical</option>
                </select>
              </div>
            </div>
            <div class="mt-3">
              <label class="form-label">Describe Your Issue *</label>
              <textarea class="form-control" rows="5" placeholder="Please provide as much detail as possible..." required></textarea>
            </div>
            <button type="submit" class="btn bg-accent-orange text-white w-100 mt-3">Submit Support Request</button>
          </form>
        </div>

        {{-- Monitoring Dashboard Mock --}}
        <div class="col-lg-6">
          <h2 class="mb-3">System Monitoring</h2>
          <p class="text-muted mb-4">Our remote monitoring systems ensure proactive management of your infrastructure.</p>

          <div class="bg-dark text-white p-4 rounded">
            <div class="d-flex justify-content-between mb-3">
              <h6>Network Status</h6>
              <span class="text-success">All Systems Operational</span>
            </div>
            <div class="mb-3">
              <span>Network Uptime</span>
              <div class="progress">
                <div class="progress-bar bg-success" style="width:99.9%">99.9%</div>
              </div>
            </div>
            <div class="mb-3">
              <span>Server Performance</span>
              <div class="progress">
                <div class="progress-bar bg-success" style="width:95%">Optimal</div>
              </div>
            </div>
            <div class="mb-3">
              <span>Security Status</span>
              <div class="progress">
                <div class="progress-bar bg-success" style="width:100%">Protected</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  {{-- Support Features --}}
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-3">Our Support Services</h2>
      <p class="text-muted mb-5">
        Comprehensive support to ensure your technology infrastructure runs seamlessly
      </p>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <i class="bi bi-check-circle text-accent-orange fs-1 mb-3"></i>
              <h5>Preventive Maintenance</h5>
              <p class="text-muted">Regular system checks and updates to prevent issues before they occur</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <i class="bi bi-check-circle text-accent-orange fs-1 mb-3"></i>
              <h5>Emergency Response</h5>
              <p class="text-muted">Rapid response team available 24/7 for critical system failures</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <i class="bi bi-check-circle text-accent-orange fs-1 mb-3"></i>
              <h5>Remote Monitoring</h5>
              <p class="text-muted">Continuous monitoring of your systems for optimal performance</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <i class="bi bi-check-circle text-accent-orange fs-1 mb-3"></i>
              <h5>System Upgrades</h5>
              <p class="text-muted">Planned upgrades and patch management to keep systems current</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <i class="bi bi-check-circle text-accent-orange fs-1 mb-3"></i>
              <h5>Training & Documentation</h5>
              <p class="text-muted">User training and comprehensive system documentation</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <i class="bi bi-check-circle text-accent-orange fs-1 mb-3"></i>
              <h5>SLA Management</h5>
              <p class="text-muted">Guaranteed response times based on service level agreements</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Support Plans --}}
  <section class="py-5 bg-white">
    <div class="container text-center">
      <h2 class="mb-3">Support Plans</h2>
      <p class="text-muted mb-5">Choose the support plan that fits your business needs</p>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="border rounded p-4 h-100">
            <h5>Basic Support</h5>
            <p class="text-muted">Essential support for small businesses</p>
            <ul class="list-unstyled small text-muted">
              <li><i class="bi bi-check-circle text-success me-2"></i> Business hours support</li>
              <li><i class="bi bi-check-circle text-success me-2"></i> Email and phone support</li>
              <li><i class="bi bi-check-circle text-success me-2"></i> Response within 24 hours</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="border rounded p-4 h-100 bg-primary-blue text-white shadow-lg">
            <span class="badge bg-accent-orange mb-2">POPULAR</span>
            <h5>Premium Support</h5>
            <p>Comprehensive support for growing businesses</p>
            <ul class="list-unstyled small">
              <li><i class="bi bi-check-circle text-accent-orange me-2"></i> 24/7 support availability</li>
              <li><i class="bi bi-check-circle text-accent-orange me-2"></i> Priority response</li>
              <li><i class="bi bi-check-circle text-accent-orange me-2"></i> Remote monitoring included</li>
              <li><i class="bi bi-check-circle text-accent-orange me-2"></i> Quarterly system reviews</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="border rounded p-4 h-100">
            <h5>Enterprise Support</h5>
            <p class="text-muted">Dedicated support for large organizations</p>
            <ul class="list-unstyled small text-muted">
              <li><i class="bi bi-check-circle text-success me-2"></i> Dedicated account manager</li>
              <li><i class="bi bi-check-circle text-success me-2"></i> Custom SLA agreements</li>
              <li><i class="bi bi-check-circle text-success me-2"></i> On-site support available</li>
              <li><i class="bi bi-check-circle text-success me-2"></i> Proactive system optimization</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
